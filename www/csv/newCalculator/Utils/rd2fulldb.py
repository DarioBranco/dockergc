
import paramiko
import functools
import stat
import os
import DatabaseManager
import datetime
import json
import glob

basedir = "/research_data_new"
modelMap = {'BAT': 'battery_model', 'EV': 'ev_model', 'HC': 'heater_cooler_model', 'INV': 'inverters_model', 'PV': 'pv_panel_model', 'SEN': 'sensor_model', 'WASH': 'washing_machine_model'}
individualMap = {'BAT': 'battery_individual', 'CP': 'charging_point_individual', 'METRE': 'energy_meters_individual', 'EV': 'ev_individual', 'HC': 'heater_cooler_individual', 'LOC': 'location_individual', 'PRICE': 'price_list_individual','SW': 'software_system_individual', 'INV': 'inverters_model', 'PV': 'pv_panel_individual', 'TARIFF': 'tariff_scheme_individual', 'SEN': 'sensor_individual', 'WASH': 'washing_machine_individual'}
energyMap = {'CHARGE': "charging_discharging_session", 'HC': "heating_cooling_session", 'WASH': "washing_machine_session", 'PV': "solar_plant_session", 'BAT': "battery_session"}
encharMap = {'IMPEXP': "energy_import_export", 'PGCOST': 'variable_energy_cost_in_local_grid_public_grid', 'LGCOST': 'variable_energy_cost_in_local_grid_public_grid', 'PGMIX': "grid_mix_in_public_grid",'LGMIX': "grid_mix_in_local_grid"}
metMap = {'PREDICTION': "predicted_weather_data", 'MEASUREMENT': 'measured_weather_data'}
bookingMap = {'CP': "reservation_booking_logs"}
payMap = {'EV': "payment_information"}
hasLogMap = {"sensor_data": '1', "measured_weather_data": '1', "predicted_weather_data": '1', "variable_energy_cost_in_local_grid_public_grid": '1', "grid_mix_in_public_grid": '0', "grid_mix_in_local_grid": '0', "energy_import_export": '1', "payment_information": '0', "battery_session": '1', "solar_plant_session": '1', "washing_machine_session": '1', "heating_cooling_session": '1', "charging_discharging_session": '1', "reservation_booking_logs": '0'}
isTime = ['EntryTime', 'ExitTime', 'timestamp', 'Time', 'AST', 'AET', 'EST', 'LET', 'StartTime', 'StopTime', 'Start', 'End', 'PredTime']
isTimeStamp = ['PluginTime', 'PlugoutTime']



def recursive_download(current_dir, name_map, database_file_name, file_type, metadata=True):


    parents = os.walk(current_dir)


    for root, subdir, files in parents:

        for parent in files:

            if parent.endswith('csv') and 'copy' not in parent:
                #try:
                    parSplitted = parent.split('-')
                    print(parSplitted)
                    if(parSplitted[-2] != 'W' and parSplitted[-2] != 'V' and parSplitted[-2] != 'kVAh' and parSplitted[-2] != 'PF' and parSplitted[-2] != 'A'):
                        print(os.path.join(root, parent))

                        remote_file = open(os.path.join(root, parent), 'r')
                        tokens = parent.split("-")


                        type = tokens[-1].split(".")[0]
                        parameters = remote_file.readline()
                        print(parameters)
                        if parameters[-1] == '\n':
                            parameters = parameters[:-1]
                        parameters = parameters.replace(" ", "")
                        parameters = parameters.split(";")
                        if(file_type == 0 or file_type == 1):

                            allrows = remote_file.readlines()
                            for values in allrows:
                                if values[-1] == '\n':
                                    values = values[:-1]
                                values = values.split(";")

                                if (values[0].lstrip() != ''):
                                    if(file_type == 0):
                                        checkModel(parameters, values, name_map, type, parent)
                                    elif(file_type == 1):
                                        checkIndividual(parameters, values, name_map, type, parent)
                        elif(file_type == 2):
                            values = remote_file.readline()
                            if values[-1] == '\n':
                                values = values[:-1]

                            values = values.split(";")
                            if (values[0].lstrip() != ''):
                                logtype = tokens[4]
                                localpath = root + "/" + parent
                                if(logtype == 'BOOKING'):
                                    type = tokens[5]
                                    checkLog(parameters, values, bookingMap, type, localpath, remote_file)
                                elif(logtype == 'ENERGY'):
                                    type = tokens[5]
                                    try:
                                        checkLog(parameters, values, energyMap, type, localpath, remote_file)
                                        print('hello')
                                    except:
                                        print('i am here')
                                        type = type.split('.')[0]
                                        if(type != "PREDICTION PV"):
                                            checkLog(parameters, values, energyMap, type, localpath, remote_file)

                                elif (logtype == 'PAY'):
                                    type = tokens[5]
                                    checkLog(parameters, values, payMap, type, localpath, remote_file)
                                elif(logtype == 'ENCHAR'):
                                    type = tokens[5] + tokens[6].split('.')[0]
                                    checkLog(parameters, values, encharMap, type, localpath, remote_file)
                                elif (logtype == 'MET'):
                                    type = tokens[5]
                                    checkLog(parameters, values, metMap, type, localpath, remote_file)
                #except Exception as e:
                #    with open('./logfile.txt', "a") as f:
                #        f.write("***********************************\n")
                #        f.write('Error function: recursive_download \n')
                #        f.write('Error Code:' + str(e) + '\n')
                #        f.write('File: ' + localpath.split('/')[-1] + '\n')
                #        f.write("***********************************\n")
                #        f.write("\n")



def checkModel(parameters, values, name_map, type, localpath):
    try:
        sql = ''' SELECT * FROM ''' + name_map[type] + ' WHERE MakeM=?'
        conn = DatabaseManager.create_connection(database_file_name)
        cur = conn.cursor()
        #print(values[0])
        cur.execute(sql, (values[0],))
        rows = cur.fetchall()
        #print(len(rows))
        if (len(rows) == 0):
            insertInDB(parameters,values, name_map, conn, type, localpath)
    except Exception as e:
        with open('./logfile.txt', "a") as f:
            f.write("***********************************\n")
            f.write('Error function: checkModel \n')
            f.write('Error Code:' + str(e) + '\n')
            f.write('File: ' + localpath.split('/')[-1] + '\n')
            f.write("***********************************\n")



def checkIndividual(parameters, values, name_map, type, localpath):
    sql = ''' SELECT * FROM ''' + name_map[type] + ' WHERE'
    conn = DatabaseManager.create_connection(database_file_name)
    for element in parameters:
        sql = sql + ' ' + str(element) + '=? AND'
    sql = sql[:-3]
    cur = conn.cursor()
    #print(sql)
    #print(values)
    try:
        cur.execute(sql.encode('ascii', 'ignore').decode("utf-8"), values)
        rows = cur.fetchall()
        #print(len(rows))
        if (len(rows) == 0):
            insertInDB(parameters, values, name_map, conn, type, localpath)
    except Exception as e:


        with open('./logfile.txt', "a") as f:
            f.write("***********************************\n")
            f.write('Error function: checkIndividual \n')
            f.write('Error Code:' + str(e) + '\n')
            f.write('File: ' + localpath.split('/')[-1] + '\n')
            f.write("***********************************\n")
        print('sintax error in file')



def checkLog(parameters, values, name_map, type, localpath, remote_file):
    sql = ''' SELECT * FROM ''' + name_map[type] + ' WHERE'
    conn = DatabaseManager.create_connection(database_file_name)
    for element in parameters:
        sql = sql + ' ' + str(element) + '=? AND'
    sql = sql[:-3]
    cur = conn.cursor()
    localpath2 = localpath
    localpath = localpath.replace('.csv', '') + '_copy.csv'
    try:
        #if(1==1):
        if('CP' in name_map.keys()):
            rows = []
        else:
            None
            #cur.execute(sql.encode('ascii', 'ignore').decode("utf-8"), values)
            #rows = cur.fetchall()
        #print(len(rows))
        rows = []
        if (len(rows) == 0):
            if(hasLogMap[name_map[type]] == '1' or hasLogMap[name_map[type]] == 1):
                parameters.append('startPoint')
                parameters.append('endPoint')
                parameters.append('pathTofile')
                count = 0
                lastline = ''
                with open(localpath, "w") as f:
                    for line in (remote_file.readlines()):
                        line = line.rstrip()
                        if line != '':
                            if(count == 0):
                                datestring = line.split(';')[0]
                                #.split('T')[0] + ' ' + line.split(';')[0].split('T')[1]
                                date_time_obj = datetime.datetime.strptime(datestring,'%Y%m%dT%H%M%S')
                                values.append(date_time_obj)

                            datestring = line.split(';')[0]
                            #.split('T')[0] + ' ' + line.split(';')[0].split('T')[1]
                            date_time_obj = datetime.datetime.strptime(datestring, '%Y%m%dT%H%M%S')
                            val = str(datetime.datetime.timestamp(date_time_obj)) + ';' + line.split(';')[1] +'\n'
                            f.write(val)
                            lastline = line
                            count+=1
                try:
                    datestring = lastline.split(';')[0].split('T')[0] + ' ' + lastline.split(';')[0].split('T')[1]
                    date_time_obj_fin = datetime.datetime.strptime(datestring, '%Y%m%d %H%M%S')
                except:
                    datestring = localpath.split('/')[-1].split('-')[3]
                    date_time_obj_fin = datetime.datetime.strptime(datestring, '%Y%m%dT%H%M%S')

                values.append(date_time_obj_fin)

                for i, value in enumerate(parameters):
                    if(value == 'PluginTime'):
                        date_time_obj_fin = datetime.datetime.strptime(values[i], '%Y%m%dT%H%M%S')
                        values[i] = date_time_obj_fin
                    if(value == 'PlugoutTime'):
                        date_time_obj_fin = datetime.datetime.strptime(values[i], '%Y%m%dT%H%M%S')
                        values[i] = date_time_obj_fin
                    if(value == 'AET'):
                        date_time_obj_fin = datetime.datetime.strptime(values[i], '%Y%m%dT%H%M%S')
                        values[i] = date_time_obj_fin
                values.append(localpath)
            if('CP' in name_map.keys()):
                    if( name_map['CP'] == 'reservation_booking_logs'):
                        parameters = ['ReqID','CPID','LOC','ChrgSessID','Time','EVID','Conn','EventType','Status','EST','LFT','EnergyStart','EnergyEnd','EnergyMin','SOCStart','SOCEnd','Priority','V2G','PriceListID','TariffID','SwID']
                        valuesTwo = []
                        for i in range(9):
                            valuesTwo.append(values[i])

                        x = values[9]

                        #y = json.loads(x[1:-1].replace("\\", "").replace('""', '"').replace(': ,', ': 0,').replace(': }', ': 0}').replace('"EST":', '"EST":"').replace(',"LFT":', '","LFT":"').replace(',"EnergyStart"', '","EnergyStart"').replace("UNKNOWN", '"UNKNOWN"').replace('""','"'))
                        try:
                            y = json.loads(x[1:-1].replace('null','"UNKNOWN"').replace('false','"false"').replace('true','"true"').replace("\\", ''))
                        except:
                            y = json.loads(x.replace('null','"UNKNOWN"').replace('false','"false"').replace('true','"true"').replace("\\", ''))

                        valuesTwo.append(y['EST'])
                        valuesTwo.append(y['LFT'])
                        valuesTwo.append(y['EnergyStart'])
                        valuesTwo.append(y['EnergyEnd'])
                        valuesTwo.append(y['EnergyMin'])
                        valuesTwo.append(y['SOCStart'])
                        valuesTwo.append(y['SOCEnd'])
                        valuesTwo.append(y['Priority'])
                        valuesTwo.append(y['V2G'])
                        valuesTwo.append(values[10])
                        valuesTwo.append(values[11])
                        valuesTwo.append(values[12])
                        insertInDB(parameters, valuesTwo, name_map, conn, type, localpath)
            else:
                insertInDB(parameters, values, name_map, conn, type, localpath)

    except Exception as e:
        print(e)
        print(localpath)
        with open('./logfile.txt', "a") as f:
            f.write("***********************************\n")
            f.write('Error function: checkLog \n')
            f.write('Error Code:' + str(e) + '\n')
            f.write('File: ' + localpath2.split('/')[-1] + '\n')
            f.write("***********************************\n")
        print('sintax error in file')






def insertInDB(parameters,values, name_map, conn, type, localpath):
    try:
        sql = ''' INSERT INTO ''' + name_map[type] + ' ('
        bindString = 'VALUES('
        for element in parameters:
            sql = sql + str(element) + ','
            bindString = bindString + '?,'
        sql = sql[:-1] + ') ' + bindString[:-1] + ')'
        print(sql.encode('ascii', 'ignore').decode("utf-8"))

        cur = conn.cursor()
        for index in range(len(parameters)):
            if(parameters[index] in isTime):
                try:
                    datestring = values[index].split('T')[0] + ' ' + values[index].split('T')[1]
                    date_time_obj = datetime.datetime.strptime(datestring, '%Y%m%d %H%M%S')
                    values[index] = date_time_obj

                except:
                    values[index] = 'Null'
        cur.execute(sql.encode('ascii', 'ignore').decode("utf-8"), values)
        conn.commit()
    except Exception as e:
    
        print(e)
        print(localpath)
        with open('./logfile.txt', "a") as f:
            f.write("***********************************\n")
            f.write('Error function: InsertInDB \n')
            f.write('Error Code:' + str(e) + '\n')
            f.write('File: ' + localpath.split('/')[-1] + '\n')
            f.write("***********************************\n")
        print('sintax error in file')


if __name__ == "__main__":
    # ip = 'parsec2.unicampania.it'


    if not os.path.exists("shared"):
        os.mkdir("shared")
    try:
        os.remove('./gcfull6.db')
    except:
        None
    database_file_name = r"./gcfull6.db"
    with open('./logfile.txt', "w") as f:
        f.write('start')
    DatabaseManager.createTables(database_file_name)
    recursive_download('./research_data_new/devices', modelMap, database_file_name, 0)
    recursive_download('./research_data_new/individual_entities', individualMap, database_file_name, 1)
    recursive_download('./research_data_new/recordings_logs', None, database_file_name, 2)

    # cmd='cd public_html/gccalculator/csv/inputs/logfiles'
