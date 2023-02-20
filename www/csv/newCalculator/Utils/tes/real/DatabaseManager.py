import sqlite3
from sqlite3 import Error
import glob
import os

def create_table(conn, create_table_sql):
    try:
        c = conn.cursor()
        c.execute(create_table_sql)
    except Error as e:
        print(e)


def create_connection(db_file):
    """ create a database connection to the SQLite database
        specified by db_file
    :param db_file: database file
    :return: Connection object or None
    """
    conn = None
    try:
        conn = sqlite3.connect(db_file, detect_types=sqlite3.PARSE_DECLTYPES | sqlite3.PARSE_COLNAMES)
        return conn
    except Error as e:
        print(e)

    return conn




def createTables(database):

    sql_create_heater_cooler_model = """ CREATE TABLE "heater_cooler_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        Type TEXT,
                                        PowerLevel TEXT
                                        );
                                     """
    sql_create_pv_panel_model = """ CREATE TABLE "pv_panel_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        Year TEXT,
                                        Type TEXT,
                                        PeakPower TEXT,
                                        Size TEXT,
                                        Noct TEXT,
                                        Albedo TEXT,
                                        TempCoeffP TEXT,
                                        TempCoeffU TEXT,
                                        TempCoeffI TEXT
                                        );
                                     """
    sql_create_battery_model = """ CREATE TABLE "battery_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        Type TEXT,
                                        Capacity TEXT,
                                        CEfficiency TEXT,
                                        DisCEfficiency TEXT,
                                        MaxCPower TEXT,
                                        MaxDisCPower TEXT,
                                        Cycle TEXT
                                        );
                                     """
    sql_create_washing_machine_model = """ CREATE TABLE "washing_machine_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        Type TEXT,
                                        Pgms TEXT
                                        );
                                     """
    sql_create_inverters_model = """ CREATE TABLE "inverters_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        InvType TEXT,
                                        Size TEXT,
                                        MaxInpPower TEXT,
                                        MaxOutPower TEXT,
                                        Efficiency TEXT,
                                        Type TEXT
                                        );
                                     """
    sql_create_sensor_model = """ CREATE TABLE "sensor_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        MaxRes TEXT,
                                        Type TEXT
                                        );
                                     """
    sql_create_ev_model = """ CREATE TABLE "ev_model" (
                                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                        MakeM TEXT,
                                        BatCap TEXT,
                                        BatCapNameplate  TEXT,
                                        EffCharAC  TEXT,
                                        EffDischarAC  TEXT,
                                        EffCharDC  TEXT,
                                        EffDischarDC  TEXT,
                                        MaxChPwrAC  TEXT,
                                        MaxChPwrDC TEXT,
                                        MaxDischPwrAC TEXT,
                                        MaxDischPwrDC TEXT
                                        );
                                     """
    sql_create_location_individual = """ CREATE TABLE "location_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           LOC TEXT,
                                           Demo TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           MeterID  TEXT,
                                           MaxPower  TEXT
                                           );
                                        """
    sql_create_individual_software_system_individual = """ CREATE TABLE "software_system_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           SwID TEXT,
                                           EntryTime TEXT,
                                           ExitTime  TEXT,
                                           Change  TEXT
                                           );
                                        """
    sql_create_heating_cooler_individual = """ CREATE TABLE "heater_cooler_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           HCID TEXT,
                                           LOC TEXT,
                                           SUBLOC TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           MakeM  TEXT
                                           );
                                        """

    sql_create_solar_plant_individual = """ CREATE TABLE "pv_panel_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           SolarPlantID TEXT,
                                           LOC TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           PeakPower  TEXT,
                                           BatteryID  TEXT,
                                           InvMakeM TEXT,
                                           InvNum TEXT,
                                           PVpanels TEXT
                                           );
                                        """

    sql_create_washing_machine_individual = """ CREATE TABLE "washing_machine_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           WashID TEXT,
                                           LOC TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           MakeM  TEXT
                                           );
                                        """
    sql_create_battery_individual = """ CREATE TABLE "battery_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           BatID TEXT,
                                           LOC TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           MakeM  TEXT,
                                           Year  TEXT,
                                           InvMakeM TEXT,
                                           InvNum TEXT
                                           );
                                        """
    sql_create_sensor_individual = """ CREATE TABLE "sensor_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           SensorID TEXT,
                                           LOC TEXT,
                                           SUBLOC TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           MakeM  TEXT
                                           );
                                        """
    sql_create_ev_individual = """ CREATE TABLE "ev_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           EVID TEXT,
                                           EntryTime TEXT,
                                           ExitTime  TEXT,
                                           Distance  TEXT,
                                           MakeM  TEXT
                                           );
                                        """
    sql_create_cp_individual = """ CREATE TABLE "charging_point_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           CPID TEXT,
                                           LOC TEXT,
                                           CPName  TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           ChrgCap TEXT,
                                           Com TEXT,
                                           Connector TEXT
                                           );
                                        """
    sql_create_energy_meters_individual = """ CREATE TABLE "energy_meters_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           MeterID TEXT,
                                           LOC TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT
                                           );
                                        """
    sql_create_price_list_individual = """ CREATE TABLE "price_list_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           PriceModelID TEXT,
                                           LOC TEXT,
                                           Type TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           Payer TEXT,
                                           Receiver TEXT,
                                           TariffID TEXT
                                           );
                                        """
    sql_create_tariff_scheme_individual = """ CREATE TABLE "tariff_scheme_individual" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           PriceModelID TEXT,
                                           TariffID TEXT,
                                           EntryTime  TEXT,
                                           ExitTime  TEXT,
                                           StartTime TEXT,
                                           EndTime TEXT,
                                           Type TEXT,
                                           PriceType TEXT,
                                           Period TEXT,
                                           Unit TEXT,
                                           Price TEXT
                                           );
                                        """
    sql_create_reservation_booking_logs = """ CREATE TABLE "reservation_booking_logs" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           ReqID TEXT,
                                           CPID TEXT,
                                           LOC TEXT,
                                           ChrgSessID  TEXT,
                                           Time  TEXT,
                                           EVID TEXT,
                                           Conn TEXT,
                                           EventType TEXT,
                                           Status TEXT,
                                           EST TEXT,
                                           LFT TEXT,
                                           EnergyStart TEXT,
                                           EnergyEnd TEXT,
                                           EnergyMin TEXT,
                                           SOCStart TEXT,
                                           SOCEnd TEXT,
                                           Priority TEXT,
                                           V2G TEXT,
                                           PriceListID TEXT,
                                           TariffID TEXT,
                                           SwID TEXT
                                           );
                                        """
    sql_create_charging_discharging_session = """ CREATE TABLE "charging_discharging_session" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           CPID TEXT,
                                           LOC TEXT,
                                           ChrgSessID TEXT,
                                           Time  TEXT,
                                           EVID  TEXT,
                                           PluginTime TEXT,
                                           PlugoutTime TEXT,
                                           SOCStart TEXT,
                                           SOCEnd TEXT,
                                           ChrgTime TEXT,
                                           MaxChACPower TEXT,
                                           MaxChDCPower TEXT,
                                           MaxDischACPower TEXT,
                                           MaxDischDCPower TEXT,
                                           SwID TEXT,
                                           PowerCh TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_heating_cooling_session = """ CREATE TABLE "heating_cooling_session" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           HCID TEXT,
                                           SwID TEXT,
                                           Time  TEXT,
                                           SetPt  TEXT,
                                           AllowedDev TEXT,
                                           AST TEXT,
                                           AET TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_washing_machine_session = """ CREATE TABLE "washing_machine_session" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           WashID TEXT,
                                           Time TEXT,
                                           EST  TEXT,
                                           LET  TEXT,
                                           AST TEXT,
                                           AET TEXT,
                                           Pgm TEXT,
                                           PriceListID TEXT,
                                           SwID TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_solar_plant_session = """ CREATE TABLE "solar_plant_session" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           PlantID TEXT,
                                           Time TEXT,
                                           PriceListID  TEXT,
                                           SwID  TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_battery_session = """ CREATE TABLE "battery_session" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           BatID TEXT,
                                           Time TEXT,
                                           SOCStart  TEXT,
                                           SOCEnd  TEXT,
                                           SwID TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """

    sql_create_payment_information = """ CREATE TABLE "payment_information" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           CPID TEXT,
                                           ChrgSessID TEXT,
                                           Time  TEXT,
                                           StartTime  TEXT,
                                           StopTime TEXT,
                                           Duration TEXT,
                                           Energy TEXT,
                                           VatPercent TEXT,
                                           PriceExclVat TEXT,
                                           Currency TEXT
                                           );
                                        """
    sql_create_energy_import_export = """ CREATE TABLE "energy_import_export" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           MeterID TEXT,
                                           Time TEXT,
                                           SwID  TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_grid_mix_in_local_grid = """ CREATE TABLE "grid_mix_in_local_grid" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           LOC TEXT,
                                           Time TEXT,
                                           LRES  TEXT,
                                           Batteries TEXT,
                                           V2G TEXT,
                                           Grid TEXT,
                                           SwID TEXT
                                           );
                                        """
    sql_create_grid_mix_in_public_grid = """ CREATE TABLE "grid_mix_in_public_grid" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           LOC TEXT,
                                           Time TEXT,
                                           Start  TEXT,
                                           End TEXT,
                                           Biomass TEXT,
                                           Lignite TEXT,
                                           Coal TEXT,
                                           Gas TEXT,
                                           HardCoal TEXT,
                                           Oil  TEXT,
                                           Shale TEXT,
                                           Peat TEXT,
                                           OtherFossil TEXT,
                                           Geothermal TEXT,
                                           HydroPumped TEXT,
                                           Hydro TEXT,
                                           Marine TEXT,
                                           Nuclear TEXT,
                                           OtherRES TEXT,
                                           Solar  TEXT,
                                           Waste TEXT,
                                           WindOffShore  TEXT,
                                           WindOnShore TEXT,
                                           SwID TEXT
                                           );
                                        """
    sql_create_variable_energy_cost_in_local_grid_public_grid = """ CREATE TABLE "variable_energy_cost_in_local_grid_public_grid" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           LOC TEXT,
                                           Time TEXT,
                                           Type  TEXT,
                                           PriceUnit TEXT,
                                           GridCost TEXT,
                                           PowerCost TEXT,
                                           FixedGridCost TEXT,
                                           GridPrice TEXT,
                                           PowerPrice TEXT,
                                           FixedGridPrice TEXT,
                                           pathTofile TEXT
                                           );
                                        """

    sql_create_predicted_weather_data = """ CREATE TABLE "predicted_weather_data" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           LOC TEXT,
                                           Time TEXT,
                                           PredTime  TEXT,
                                           Type TEXT,
                                           Unit TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_measured_weather_data = """ CREATE TABLE "measured_weather_data" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           LOC TEXT,
                                           SensorID TEXT,
                                           Time  TEXT,
                                           Type TEXT,
                                           Unit TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    sql_create_sensor_data = """ CREATE TABLE "sensor_data" (
                                           id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                                           SensorID TEXT,
                                           Time TEXT,
                                           Type  TEXT,
                                           Unit TEXT,
                                           startPoint TEXT,
                                           endPoint TEXT,
                                           pathTofile TEXT
                                           );
                                        """
    # create a database connection
    conn = create_connection(database)

    # create tables
    if conn is not None:
        # create projects table
        create_table(conn, sql_create_heater_cooler_model)
        create_table(conn, sql_create_pv_panel_model)
        create_table(conn, sql_create_battery_model)
        create_table(conn, sql_create_inverters_model)
        create_table(conn, sql_create_washing_machine_model)
        create_table(conn, sql_create_sensor_model)
        create_table(conn, sql_create_ev_model)
        create_table(conn, sql_create_location_individual)
        create_table(conn, sql_create_individual_software_system_individual)
        create_table(conn, sql_create_heating_cooler_individual)
        create_table(conn, sql_create_solar_plant_individual)
        create_table(conn, sql_create_washing_machine_individual)
        create_table(conn, sql_create_battery_individual)
        create_table(conn, sql_create_sensor_individual)
        create_table(conn, sql_create_ev_individual)
        create_table(conn, sql_create_cp_individual)
        create_table(conn, sql_create_energy_meters_individual)
        create_table(conn, sql_create_price_list_individual)
        create_table(conn, sql_create_tariff_scheme_individual)
        create_table(conn, sql_create_reservation_booking_logs)
        create_table(conn, sql_create_charging_discharging_session)
        create_table(conn, sql_create_washing_machine_session)
        create_table(conn, sql_create_solar_plant_session)
        create_table(conn, sql_create_battery_session)
        create_table(conn, sql_create_payment_information)
        create_table(conn, sql_create_energy_import_export)
        create_table(conn, sql_create_grid_mix_in_local_grid)
        create_table(conn, sql_create_grid_mix_in_public_grid)
        create_table(conn, sql_create_variable_energy_cost_in_local_grid_public_grid)
        create_table(conn, sql_create_predicted_weather_data)
        create_table(conn, sql_create_measured_weather_data)
        create_table(conn, sql_create_heating_cooling_session)
        create_table(conn, sql_create_sensor_data)

    else:
        print("Error! cannot create the database connection.")
