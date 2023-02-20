import paramiko
import functools
import stat
import os
import DatabaseManager
import datetime
import json

basedir = "/shared/research_data"
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

class SFTPDownload:
    client = None
    sftp = None

    def __init__(self, ip, port):
        self.ip = ip
        self.port = port

    def connect(self, username, password, basedir):

        self.basedir = basedir

        try:
            self.client = paramiko.SSHClient()
            self.client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
            self.client.connect(self.ip, self.port, username, password)
            self.sftp = self.client.open_sftp()
            self.sftp.chdir(basedir)

        except Exception as e:
            print(e)

    def disconnect(self):
        if self.sftp is not None:
            self.sftp.close()
        if self.client is not None:
            self.client.close()

    def recursive_download(self, current_dir, name_map, database_file_name, file_type, metadata=True):
        self.sftp.chdir(current_dir)
        current = self.sftp.getcwd()
        parents = self.sftp.listdir()
        
        localdir = current[current.index(basedir) + len(basedir):]
        print(localdir)
        if not os.path.exists("./shared/" + localdir):
            #print("mkdir ./shared/" + localdir)
            os.mkdir("./shared/" + localdir)

        for parent in parents:
            kind = stat.S_IFMT(self.sftp.stat(parent).st_mode)
            if kind == stat.S_IFDIR:
                #print(parent + " is a dir")
                self.recursive_download(parent, name_map, database_file_name, file_type)
                self.sftp.chdir(current)
            else:
                #print(basedir + "/" + localdir + "/" + parent)

                if parent.endswith('csv'):
                    try:
                        parSplitted = parent.split('-')
                        if(parSplitted[-2] != 'W' and parSplitted[-2] != 'V' and parSplitted[-2] != 'kVAh' and parSplitted[-2] != 'PF' and parSplitted[-2] != 'A'):
                            print(parent)
                            remote_file = self.sftp.file(basedir + "/" + localdir + "/" + parent, 'r')
                            tokens = parent.split("-")


                            type = tokens[-1].split(".")[0]
                            parameters = remote_file.readline()
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
                                    localpath = "./shared" + localdir + "/" + parent
                                    remotepath = basedir + "/" + localdir + "/" + parent
                                    if(logtype == 'BOOKING'):
                                        type = tokens[5]
                                        checkLog(parameters, values, bookingMap, type, localpath, remote_file)
                                    elif(logtype == 'ENERGY'):
                                        type = tokens[5]
                                        try:
                                            #checkLog(parameters, values, energyMap, type, localpath, remote_file)
                                            print('hello')
                                        except:
                                            type = type.split('.')[0]
                                            #checkLog(parameters, values, energyMap, type, localpath, remote_file)

                                    elif (logtype == 'PAY'):
                                        type = tokens[5]
                                        #checkLog(parameters, values, payMap, type, localpath, remote_file)
                                    elif(logtype == 'ENCHAR'):
                                        type = tokens[5] + tokens[6].split('.')[0]
                                        #checkLog(parameters, values, encharMap, type, localpath, remote_file)
                                    elif (logtype == 'MET'):
                                        type = tokens[5]
                                        #checkLog(parameters, values, metMap, type, localpath, remote_file)
                    except:
                        print('Error in ' + str(parent))



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
    except:
        print(localpath)
        with open('./logfile.txt', "w") as f:
            f.write(localpath)


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
        
        
        with open('./logfile.txt', "w") as f:
            f.write(localpath)
        print('sintax error in file')



def checkLog(parameters, values, name_map, type, localpath, remote_file):
    sql = ''' SELECT * FROM ''' + name_map[type] + ' WHERE'
    conn = DatabaseManager.create_connection(database_file_name)
    for element in parameters:
        sql = sql + ' ' + str(element) + '=? AND'
    sql = sql[:-3]
    cur = conn.cursor()
    print(values)
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
                        print(x[1:-1].replace("\\", ""))
                        y = json.loads(x[1:-1].replace('\\', '')) 
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
        with open('./logfile.txt', "w") as f:
           f.write(localpath.split('/')[-1])
        print('sintax error in file')






def insertInDB(parameters,values, name_map, conn, type, localpath):
    try:
        sql = ''' INSERT INTO ''' + name_map[type] + ' ('
        bindString = 'VALUES('
        for element in parameters:
            sql = sql + str(element) + ','
            bindString = bindString + '?,'
        sql = sql[:-1] + ') ' + bindString[:-1] + ')'
        cur = conn.cursor()
        #print(sql.encode('ascii', 'ignore').decode("utf-8"))
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
            f.write(e)
            f.write("\n")
            f.write(localpath.split('/')[-1])
        print('sintax error in file')


if __name__ == "__main__":
    # ip = 'parsec2.unicampania.it'
    ip = "data.sintef.no"
    port = 22
    server = SFTPDownload(ip, port)
    server.connect("greencharge_simulator", "STEyaNtHEaTE", basedir)

    if not os.path.exists("shared"):
        os.mkdir("shared")
    try:
        os.remove('../gcfull5.db')
    except:
        None
    database_file_name = r"../gcfull5.db"

    DatabaseManager.createTables(database_file_name)
    #server.recursive_download('/shared/research_data/devices', modelMap, database_file_name, 0)
    #server.recursive_download('/shared/research_data/individual_entities', individualMap, database_file_name, 1)
    server.recursive_download('/shared/research_data/recordings_logs', None, database_file_name, 2)
    server.disconnect()

    # cmd='cd public_html/gccalculator/csv/inputs/logfiles'
