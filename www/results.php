
<?php

/*
session_start();

include("include/DatabaseManager.php");
$db = new DatabaseManager();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header("location: index.php");
    exit;
}*/
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - GreenCharge Visualization and Evaluation Tool</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/checker.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/greencharge.js"></script>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			<script src="https://code.highcharts.com/stock/highstock.js"></script>
 
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

 	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
 
	<script src = "https://code.highcharts.com/highcharts.js"></script>  

	<script src = "https://code.highcharts.com/highcharts-3d.js"></script> 
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
	<script type="text/javascript" src="http://code.highcharts.com/stock/highstock.js"></script>
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>   
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.min.js"></script>
</head>

<body id="page-top">



  <?php
  ini_set('display_errors', 1);
  $countfile = 0;
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);



	
	$filename = 'values.csv';
	$dataArr = array();

	$totalFileArray = array();
	$totalFileArrayPerDim = array();

	if (($handle = fopen($filename, "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, " ")) !== FALSE) {
					$num = count($data);
						if($data[0] != "NoOne"){

							if(!array_key_exists($data[0],$totalFileArrayPerDim)){

								$totalFileArrayPerDim[$data[0]][0] = intval($data[3]);
								$totalFileArrayPerDim[$data[0]][1] = intval($data[4]);
								}
							else{
								$totalFileArrayPerDim[$data[0]][0] = $totalFileArrayPerDim[$data[0]][0] + intval($data[3]);
								$totalFileArrayPerDim[$data[0]][1] = $totalFileArrayPerDim[$data[0]][1] + intval($data[4]);

							}
						 }
					   if($data[1] == "Energy_Mix"){
						   if($data[0] != "NoOne"){
							    $dataArr["Energy_Mix"]["Count"] = $data[2];
						   		$dataArr["Energy_Mix"][$data[0]][0] = $data[3];
								$dataArr["Energy_Mix"][$data[0]][1] = $data[4];
								if(!array_key_exists("Energy_Mix",$totalFileArray)){
									$totalFileArray["Energy_Mix"] = $data[2];
								}

						   }
						   else{$dataArr["Energy_Mix"]["Count"] = 0;}
					   }
					   elseif($data[1] == "Energy_Costs"){
						   if($data[0] != "NoOne"){
							    $dataArr["Energy_Costs"]["Count"] = $data[2];
						   		$dataArr["Energy_Costs"][$data[0]][0] = $data[3];
								$dataArr["Energy_Costs"][$data[0]][1] = $data[4];
								if(!array_key_exists("Energy_Costs",$totalFileArray)){
									$totalFileArray["Energy_Costs"] = $data[2];
								}
						   }else{$dataArr["Energy_Costs"]["Count"] = 0;}
					   }	
					   elseif($data[1] == "Energy_import_export"){
						   if($data[0] != "NoOne"){
							    $dataArr["Energy_import_export"]["Count"] = $data[2];
						   		$dataArr["Energy_import_export"][$data[0]][0] = $data[3];
								$dataArr["Energy_import_export"][$data[0]][1] = $data[4];
								if(!array_key_exists("Energy_import_export",$totalFileArray)){
									$totalFileArray["Energy_import_export"] = $data[2];
								}
						   }else{$dataArr["Energy_import_export"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "battery_sessions"){
						   if($data[0] != "NoOne"){
							    $dataArr["battery_sessions"]["Count"] = $data[2];
						   		$dataArr["battery_sessions"][$data[0]][0] = $data[3];
								$dataArr["battery_sessions"][$data[0]][1] = $data[4];
								if(!array_key_exists("battery_sessions",$totalFileArray)){
									$totalFileArray["battery_sessions"] = $data[2];
								}
						   }else{$dataArr["battery_sessions"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "ev_charging_discharging"){
						   if($data[0] != "NoOne"){
							    $dataArr["ev_charging_discharging"]["Count"] = $data[2];
						   		$dataArr["ev_charging_discharging"][$data[0]][0] = $data[3];
								$dataArr["ev_charging_discharging"][$data[0]][1] = $data[4];
								if(!array_key_exists("ev_charging_discharging",$totalFileArray)){
									$totalFileArray["ev_charging_discharging"] = $data[2];
								}
						   }else{$dataArr["ev_charging_discharging"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "heating_cooling_sessions"){
						   if($data[0] != "NoOne"){
							    $dataArr["heating_cooling_sessions"]["Count"] = $data[2];
						   		$dataArr["heating_cooling_sessions"][$data[0]][0] = $data[3];
								$dataArr["heating_cooling_sessions"][$data[0]][1] = $data[4];
								if(!array_key_exists("heating_cooling_sessions",$totalFileArray)){
									$totalFileArray["heating_cooling_sessions"] = $data[2];
								}
						   }else{$dataArr["heating_cooling_sessions"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "solar_plant_sessions"){
						   if($data[0] != "NoOne"){
							    $dataArr["solar_plant_sessions"]["Count"] = $data[2];
						   		$dataArr["solar_plant_sessions"][$data[0]][0] = $data[3];
								$dataArr["solar_plant_sessions"][$data[0]][1] = $data[4];
								if(!array_key_exists("solar_plant_sessions",$totalFileArray)){
									$totalFileArray["solar_plant_sessions"] = $data[2];
								}
						   }else{$dataArr["solar_plant_sessions"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "washing_sessions"){
						   if($data[0] != "NoOne"){
							    $dataArr["washing_sessions"]["Count"] = $data[2];
						   		$dataArr["washing_sessions"][$data[0]][0] = $data[3];
								$dataArr["washing_sessions"][$data[0]][1] = $data[4];
								if(!array_key_exists("washing_sessions",$totalFileArray)){
									$totalFileArray["washing_sessions"] = $data[2];
								}
						   }else{$dataArr["washing_sessions"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "reservations_bookings"){
						   if($data[0] != "NoOne"){
							    $dataArr["reservations_bookings"]["Count"] = $data[2];
						   		$dataArr["reservations_bookings"][$data[0]][0] = $data[3];
								$dataArr["reservations_bookings"][$data[0]][1] = $data[4];
								if(!array_key_exists("reservations_bookings",$totalFileArray)){
									$totalFileArray["reservations_bookings"] = $data[2];
								}
						   }else{$dataArr["reservations_bookings"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "payment_information"){
						   if($data[0] != "NoOne"){
							    $dataArr["payment_information"]["Count"] = $data[2];
						   		$dataArr["payment_information"][$data[0]][0] = $data[3];
								$dataArr["payment_information"][$data[0]][1] = $data[4];
								if(!array_key_exists("payment_information",$totalFileArray)){
									$totalFileArray["payment_information"] = $data[2];
								}
						   }else{$dataArr["payment_information"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "weather_data"){
						   if($data[0] != "NoOne"){
							    $dataArr["weather_data"]["Count"] = $data[2];
						   		$dataArr["weather_data"][$data[0]][0] = $data[3];
								$dataArr["weather_data"][$data[0]][1] = $data[4];
								if(!array_key_exists("weather_data",$totalFileArray)){
									$totalFileArray["weather_data"] = $data[2];
								}
						   }else{$dataArr["weather_data"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "batteries_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["batteries_model"]["Count"] = $data[2];
						   		$dataArr["batteries_model"][$data[0]][0] = $data[3];
								$dataArr["batteries_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("batteries_model",$totalFileArray)){
									$totalFileArray["batteries_model"] = $data[2];
								}
						   }else{$dataArr["batteries_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "evs_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["evs_model"]["Count"] = $data[2];
						   		$dataArr["evs_model"][$data[0]][0] = $data[3];
								$dataArr["evs_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("evs_model",$totalFileArray)){
									$totalFileArray["evs_model"] = $data[2];
								}
						   }else{$dataArr["evs_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "heating_cooling_devices_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["heating_cooling_devices_model"]["Count"] = $data[2];
						   		$dataArr["heating_cooling_devices_model"][$data[0]][0] = $data[3];
								$dataArr["heating_cooling_devices_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("heating_cooling_devices_model",$totalFileArray)){
									$totalFileArray["heating_cooling_devices_model"] = $data[2];
								}
						   }else{$dataArr["heating_cooling_devices_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "inverters_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["inverters_model"]["Count"] = $data[2];
						   		$dataArr["inverters_model"][$data[0]][0] = $data[3];
								$dataArr["inverters_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("inverters_model",$totalFileArray)){
									$totalFileArray["inverters_model"] = $data[2];
								}
						   }else{$dataArr["inverters_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "pv_panels_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["pv_panels_model"]["Count"] = $data[2];
						   		$dataArr["pv_panels_model"][$data[0]][0] = $data[3];
								$dataArr["pv_panels_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("pv_panels_model",$totalFileArray)){
									$totalFileArray["pv_panels_model"] = $data[2];
								}
						   }else{$dataArr["pv_panels_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "sensors_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["sensors_model"]["Count"] = $data[2];
						   		$dataArr["sensors_model"][$data[0]][0] = $data[3];
								$dataArr["sensors_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("sensors_model",$totalFileArray)){
									$totalFileArray["sensors_model"] = $data[2];
								}
						   }else{$dataArr["sensors_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "washing_machines_model"){
						   if($data[0] != "NoOne"){
							    $dataArr["washing_machines_model"]["Count"] = $data[2];
						   		$dataArr["washing_machines_model"][$data[0]][0] = $data[3];
								$dataArr["washing_machines_model"][$data[0]][1] = $data[4];
								if(!array_key_exists("washing_machines_model",$totalFileArray)){
									$totalFileArray["washing_machines_model"] = $data[2];
								}
						   }else{$dataArr["washing_machines_model"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "batteries_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["batteries_individual"]["Count"] = $data[2];
						   		$dataArr["batteries_individual"][$data[0]][0] = $data[3];
								$dataArr["batteries_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("batteries_individual",$totalFileArray)){
									$totalFileArray["batteries_individual"] = $data[2];
								}
						   }else{$dataArr["batteries_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "evs_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["evs_individual"]["Count"] = $data[2];
						   		$dataArr["evs_individual"][$data[0]][0] = $data[3];
								$dataArr["evs_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("evs_individual",$totalFileArray)){
									$totalFileArray["evs_individual"] = $data[2];
								}
						   }else{$dataArr["evs_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "heating_cooling_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["heating_cooling_individual"]["Count"] = $data[2];
						   		$dataArr["heating_cooling_individual"][$data[0]][0] = $data[3];
								$dataArr["heating_cooling_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("heating_cooling_individual",$totalFileArray)){
									$totalFileArray["heating_cooling_individual"] = $data[2];
								}
						   }else{$dataArr["heating_cooling_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "pv_panels_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["pv_panels_individual"]["Count"] = $data[2];
						   		$dataArr["pv_panels_individual"][$data[0]][0] = $data[3];
								$dataArr["pv_panels_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("pv_panels_individual",$totalFileArray)){
									$totalFileArray["pv_panels_individual"] = $data[2];
								}
						   }else{$dataArr["pv_panels_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "sensors_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["sensors_individual"]["Count"] = $data[2];
						   		$dataArr["sensors_individual"][$data[0]][0] = $data[3];
								$dataArr["sensors_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("sensors_individual",$totalFileArray)){
									$totalFileArray["sensors_individual"] = $data[2];
								}
						   }else{$dataArr["sensors_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "washing_machines_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["washing_machines_individual"]["Count"] = $data[2];
						   		$dataArr["washing_machines_individual"][$data[0]][0] = $data[3];
								$dataArr["washing_machines_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("washing_machines_individual",$totalFileArray)){
									$totalFileArray["washing_machines_individual"] = $data[2];
								}
						   }else{$dataArr["washing_machines_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "charge_points_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["charge_points_individual"]["Count"] = $data[2];
						   		$dataArr["charge_points_individual"][$data[0]][0] = $data[3];
								$dataArr["charge_points_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("charge_points_individual",$totalFileArray)){
									$totalFileArray["charge_points_individual"] = $data[2];
								}
						   }else{$dataArr["charge_points_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "energy_meters_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["energy_meters_individual"]["Count"] = $data[2];
						   		$dataArr["energy_meters_individual"][$data[0]][0] = $data[3];
								$dataArr["energy_meters_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("energy_meters_individual",$totalFileArray)){
									$totalFileArray["energy_meters_individual"] = $data[2];
								}
						   }else{$dataArr["energy_meters_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "locations_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["locations_individual"]["Count"] = $data[2];
						   		$dataArr["locations_individual"][$data[0]][0] = $data[3];
								$dataArr["locations_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("locations_individual",$totalFileArray)){
									$totalFileArray["locations_individual"] = $data[2];
								}
						   }else{$dataArr["locations_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "price_list_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["price_list_individual"]["Count"] = $data[2];
						   		$dataArr["price_list_individual"][$data[0]][0] = $data[3];
								$dataArr["price_list_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("price_list_individual",$totalFileArray)){
									$totalFileArray["price_list_individual"] = $data[2];
								}
						   }else{$dataArr["price_list_individual"]["Count"] = 0;}
					   }					   
					   elseif($data[1] == "sw_sys_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["sw_sys_individual"]["Count"] = $data[2];
						   		$dataArr["sw_sys_individual"][$data[0]][0] = $data[3];
								$dataArr["sw_sys_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("sw_sys_individual",$totalFileArray)){
									$totalFileArray["sw_sys_individual"] = $data[2];
								}
						   }else{$dataArr["sw_sys_individual"]["Count"] = 0;}
					   }	
					   elseif($data[1] == "tariffs_individual"){
						   if($data[0] != "NoOne"){
							    $dataArr["tariffs_individual"]["Count"] = $data[2];
						   		$dataArr["tariffs_individual"][$data[0]][0] = $data[3];
								$dataArr["tariffs_individual"][$data[0]][1] = $data[4];
								if(!array_key_exists("tariffs_individual",$totalFileArray)){
									$totalFileArray["tariffs_individual"] = $data[2];
								}
						   }else{$dataArr["tariffs_individual"]["Count"] = 0;}
					   }
						else{
							print_r("problema");
						}
					
				}

				fclose($handle);
			  }

				$TotalNumFile = 0;
				foreach ($totalFileArray as &$value) {
					$TotalNumFile = $TotalNumFile +$value;
				}

      ?>



    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary2 p-0" style="background-color: #599f4f;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <img src="gc.png" alt="GreenCharge Logo" width="55" height="65">
                    <div class="sidebar-brand-text mx-3"><span>GreenCharge</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://localhost:8080/dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://localhost:8080/history.php"><i class="fas fa-history"></i><span>Evaluation History</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://localhost:8080/dashboard.php?done=true"><i class="fas fa-hand-point-left"></i><span>Last Evaluation</span></a></li>

                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                       
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
				<i class="fas fa-globe-africa"></i>

		
                    <h3 class="text-dark mb-0">FileChecker Dashboard</h3><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
				
				<div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
					<div class="modal-dialog modal-dialog-centered justify-content-center" role="document" data-keyboard="false" data-backdrop="static">
						<span class="fa fa-spinner fa-spin fa-3x"></span>
					</div>
				</div>
                <div class="row">
                   

                     <div class="col-lg-7 col-xl-8">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Total FileChecker Overview</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download" role="presentation" download="ChartImage.jpg" >Download</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="w-100 p-3"><canvas id="pieTotal" ></canvas></div>
							<div></div>
                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo $TotalNumFile;?></span></div>
                    </div>
                </div>
				</div>
				            <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Total Files By Pilot Overview</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download2" role="presentation" download="ChartImage.jpg" >Download</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="w-100 p-3"><canvas id="pieTotal2" width="2" height="2.3"></canvas></div>
							<div></div>
                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo $TotalNumFile;?></span></div>
                    </div>
                </div>
				</div>
                </div>
				
				
				



                <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Energy Mix</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download3" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download33" role="presentation" download="ChartImage.jpg" >Download2</a>

								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieChartEMix" width="2" height="2"></canvas></div>
							<div></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieChartEMix2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["Energy_Mix"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
			  <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Battery Models</h6>
                           <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download4" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download34" role="presentation" download="ChartImage.jpg" >Download2</a>

								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piebatmodel" width="2" height="2"></canvas></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="piebatmodel2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["batteries_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

           <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">EV Models</h6>
                           <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download5" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download35" role="presentation" download="ChartImage.jpg" >Download2</a>

								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieevmodel" width="2" height="2"></canvas></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieevmodel2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["evs_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">PV Panel Models</h6>
                                <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download6" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download36" role="presentation" download="ChartImage.jpg" >Download2</a>

								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piepvmodels" width="2" height="2"></canvas></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="piepvmodels2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["pv_panels_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

        </div>
		
		        <div class="row">
  
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Inverter Models</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download7" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download37" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="pieinverters" width="2" height="2"></canvas></div>
														<div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieinverters2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["inverters_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Energy Meters</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download8" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download38" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieem" width="2" height="2"></canvas></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieem2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["energy_meters_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Locations</h6>
                                 <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download9" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download39" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieloc" width="2" height="2"></canvas></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieloc2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["locations_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Stationary Batteries</h6>
                             <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download10" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download40" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piebatind" width="2" height="2"></canvas></div>
							<div class="chart-area" style="margin-top:0.5cm;"><canvas id="piebatind2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["batteries_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
			
        </div>
		
     
	 
	 
	 
	         <div class="row">
     
			<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Charge Points</h6>
                                               <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download11" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download41" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="pieCpind" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;" ><canvas id="pieCpind2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["charge_points_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

  
						<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual EVs</h6>
                                                     <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download12" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download42" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="pieevindividual" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;" ><canvas id="pieevindividual2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["evs_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				
				             <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Sensor Models</h6>
                                                      <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download13" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download43" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piesensors" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piesensors2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["sensors_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
	
	

				            
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Heating/Cooling Devices</h6>
                                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download14" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download44" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piehcind" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piehcind2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["heating_cooling_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
	
	
	
	
        </div>
	 
	 
	 
	 
	 
	 
	 
	 
	  
	         <div class="row">
             		<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Software System</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download15" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download45" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piesoftware" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piesoftware2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["sw_sys_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
		

                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Heating/Cooling device Models</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download16" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download46" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piehcmodel" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piehcmodel2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["heating_cooling_devices_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Sensors</h6>
                                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download17" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download47" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piesensinv" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piesensinv2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["sensors_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Battery Sessions</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download18" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download48" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piebatterySessions" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piebatterySessions2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["battery_sessions"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

              


        </div>
	 
	 
	 
	 
	        <div class="row">
              			<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Weather Data</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download19" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download49" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="pieweather" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieweather2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["weather_data"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
   
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Washing Machine Models</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download20" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download50" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piewashmodel" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piewashmodel2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["washing_machines_model"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

		              <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Payment Information</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download21" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download51" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piePaymentInfo" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piePaymentInfo2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["payment_information"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
					           <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Washing Machine Sessions</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download22" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download52" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piewashingsession" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piewashingsession2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["washing_sessions"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
        </div>
	 
	 
	 
	 
	       <div class="row">
		   
		   	
	             <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Energy Costs</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download23" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download53" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieChartECost" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieChartECost2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["Energy_Costs"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
  
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual PV Panels</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download24" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download54" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piepvind" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piepvind2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["pv_panels_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Washing Machines</h6>
                                                       <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download25" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download55" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piewmind" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piewmind2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["washing_machines_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Reservations and Bookings Logs</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download26" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download56" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piereservations" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piereservations2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["reservations_bookings"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
	
        </div>
	 
	 
	 	       <div class="row">
              
			  
			                  <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Heating/Cooling Sessions</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download27" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download57" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piehssess" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piehssess2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["heating_cooling_sessions"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
			  
				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Solar Plant Sessions</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download28" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download58" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="piesolar_plant_sessions" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piesolar_plant_sessions2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["solar_plant_sessions"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

				<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Price List</h6>
                                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download29" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download59" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="piepriceInd" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="piepriceInd2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["price_list_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
				                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Energy Import Export</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download30" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download60" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieChartImpExp" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieChartImpExp2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["Energy_import_export"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
		
        </div>
			 	       <div class="row">

						<div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Individual Tariffs</h6>
                                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download31" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download61" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="chart-area" ><canvas id="pieTariffs" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieTariffs2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["tariffs_individual"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>

				  <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">EV Charging Discharging Sessions</h6>
                                                         <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">dropdown header:</p>
									<a class="dropdown-item" id="download32" role="presentation" download="ChartImage.jpg" >Download1</a>
									<a class="dropdown-item" id="download62" role="presentation" download="ChartImage.jpg" >Download2</a>
								</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="pieevchdis" width="2" height="2"></canvas></div>
							                            <div class="chart-area" style="margin-top:0.5cm;"><canvas id="pieevchdis2" width="2" height="2"></canvas></div>

                            <div
                                class="text-center small mt-4"><span class="mr-2"><i class="fas fa-circle text-primary"></i>Total-Files: <?php echo json_encode($dataArr["ev_charging_discharging"]["Count"]);?></span></div>
                    </div>
                </div>
				</div>
	 				</div>
				<div class="row">

						<div class="col-lg-7 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Issue Report</h6>
							  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								Expand
							  </button>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">Menu:</p><a class="dropdown-item" role="presentation" href="http://localhost:8080/output.txt">Download Report</a>
                                    <div class="dropdown-divider"></div></div>
                            </div>
                        </div>
						<div class="collapse" id="collapseExample">

                        <div class="card-body ">
								<div><p><?php $handle = fopen("output.txt", "r");
										if ($handle) {
											while (($line = fgets($handle)) !== false) {
												echo $line;
												echo "</br>"; 
											}

											fclose($handle);
										} else {
											// error opening the file.
										}  ?></p></div>
                     </div>
  
                    </div>
                </div>
				</div>
	 				</div>

				<div class="row">

						<div class="col-lg-7 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Correct Files Report</h6>
							  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
								Expand
							  </button>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                    role="menu">
                                    <p class="text-center dropdown-header">Menu:</p><a class="dropdown-item" role="presentation" href="http://localhost:8080/okFiles.txt">Download Report</a>
                                    <div class="dropdown-divider"></div></div>
                            </div>
                        </div>
						<div class="collapse" id="collapseExample2">

                        <div class="card-body ">
								<div><p><?php $handle = fopen("okFiles.txt", "r");
										if ($handle) {
											while (($line = fgets($handle)) !== false) {
												echo $line;
												echo "</br>"; 
											}

											fclose($handle);
										} else {
											// error opening the file.
										}  ?></p></div>
                     </div>
  
                    </div>
                </div>
				</div>
	 				</div>

		   
		   
		
		
	<script>
			doGraph(<?php echo json_encode($dataArr);?>);
			doTotal(<?php echo json_encode($totalFileArrayPerDim);?>);

			
		</script>
		<script src="assets/js/downloaders.js"></script>
    </div>
    </div>
  </div>
  </div>

    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © GreenCharge Visualization and Evaluation Tool 2019</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

</body>

</html>
