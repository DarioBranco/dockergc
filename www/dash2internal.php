
<?php


session_start();

include("include/DatabaseManager.php");
include("SimpleXLSXGen.php");

require("kpi.php");
$kpi = new Kpi();
$db = new DatabaseManager();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header("location: index.php");
    exit;
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - GreenCharge Visualization and Evaluation Tool</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="assets/js/datepicker2.js"></script>
    <script src="assets/js/greencharge.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
    <script src="assets/js/chart.min.js"></script>
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
</head>

<body id="page-top">



  <?php
  ini_set('display_errors', 1);
  $countfile = 0;
    		$pilotarr = ['nothing','OSL-D1', 'OSL-D2', 'OSL-D3','BRE-D1', 'BRE-D2', 'BAR-D1', 'BAR-D2', 'BAR-D3'];

  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $kpi56 = array();
  		$kpi57 = array();
		$kpi511 = array();
		$kpi512 = array();
		$kpi513 = array();
		$kpi514 = array();
		$kpi515 = array();
		$kpi521 = array();
		$kpi522 = array();
		$kpi523 = array();
		$kpi524 = array();
		$kpi5111 = array();
		$kpi581 = array();
		$kpi5112 = array();
		$months = array();
		$the_big_array = array();
		$csv0 = array();
		$csv1 = array();
		$csv010 = array();
		$csv110 = array();
		$csv2 = array();
		$csv3 = array();
		$csv4 = array();
		$xaxis = array();
		$yaxis1 = array();
		$yaxis2 = array();
		$yaxis3 = array();
		$self_consumption_array = array();
  $the_big_array = [];

  for($i = 0; $i <= 17; $i++)
    {
      $the_big_array[$i][0] = 0;
    }

  if(!empty($_GET["day"]) && isset($_GET["day"]))
  {
    $timeDate = $_GET["day"];
    $day = explode(" ",$timeDate);
    $numberOfSim = $db->getSimulationIds($day);
    $_SESSION["day"] = $_GET["day"];

  }
  if(!empty($_GET["lastday"]) && isset($_GET["lastday"]))
  {
    $_SESSION["lastday"] = $_GET["lastday"];
  }
  if(!empty($_GET["id_pilot"]) && isset($_GET["id_pilot"]))
  {
    $_SESSION["id_pilot"] = $_GET["id_pilot"];
  }
    if(!empty($_GET["location_id"]) && isset($_GET["location_id"]))
  {
    $_SESSION["location_id"] = $_GET["location_id"];
  }
  
if(!empty($_GET["loc"]) && isset($_GET["loc"]) && !empty($_GET["dem"]) && isset($_GET["dem"])  && !empty($_GET["yearkpi"]) && isset($_GET["yearkpi"]))
    {
		
		$months = array();
		if ($_GET["yearkpi"] == '2019' or $_GET["yearkpi"] == '2020' or $_GET["yearkpi"] == '2021'){
			array_push($months,"'January'", "'February'", "'March'", "'April'", "'May'", "'June'", "'July'","'August'", "'September'", "'October'","'November'","'December'");
		}
		if($_GET["yearkpi"] == '2019-2020'){
			array_push($months,"'January (2019)'", "'February (2019)'", "'March (2019)'", "'April (2019)'", "'May (2019)'", "'June (2019)'", "'July (2019)'","'August (2019)'", "'September (2019)'", "'October (2019)'","'November (2019)'","'December (2019)'","'January (2020)'", "'February (2020)'", "'March (2020)'", "'April (2020)'", "'May (2020)'", "'June (2020)'", "'July (2020)'","'August (2020)'", "'September (2020)'", "'October (2020)'","'November (2020)'","'December (2020)'");
		}
		if($_GET["yearkpi"] == '2020-2021'){
			 array_push($months,"'January (2020)'", "'February (2020)'", "'March (2020)'", "'April (2020)'", "'May (2020)'", "'June (2020)'", "'July (2020)'","'August (2020)'", "'September (2020)'", "'October (2020)'","'November (2020)'","'December (2020)'","'January (2021)'", "'February (2021)'", "'March (2021)'", "'April (2021)'", "'May (2021)'", "'June (2021)'", "'July (2021)'","'August (2021)'", "'September (2021)'", "'October (2021)'","'November (2021)'","'December (2021)'");
		}
		if($_GET["yearkpi"] == '2019-2020-2021'){
			 array_push($months,"'January (2019)'", "'February (2019)'", "'March (2019)'", "'April (2019)'", "'May (2019)'", "'June (2019)'", "'July (2019)'","'August (2019)'", "'September (2019)'", "'October (2019)'","'November (2019)'","'December (2019)'","'January (2020)'", "'February (2020)'", "'March (2020)'", "'April (2020)'", "'May (2020)'", "'June (2020)'", "'July (2020)'","'August (2020)'", "'September (2020)'", "'October (2020)'","'November (2020)'","'December (2020)'","'January (2021)'", "'February (2021)'", "'March (2021)'", "'April (2021)'", "'May (2021)'", "'June (2021)'", "'July (2021)'","'August (2021)'", "'September (2021)'", "'October (2021)'","'November (2021)'","'December (2021)'");
		}
		
		
		/*$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data.csv';
		
		if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi56,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }*/

		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data1.csv';


			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi57,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data511.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi511,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data512.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi512,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data513.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi513,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data514.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi514,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
				$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data515.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi515,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data521.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi521,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
				$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data522.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi522,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
						$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data523.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi523,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
						$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data524.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi524,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
			/*
			$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data581.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi581,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
				  
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data5111.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi5111,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }
		$filename = 'csv/kpi/business/'.$_GET["loc"].'_'.$_GET["dem"].'_'.$_GET["yearkpi"].'_data5112.csv';
			if (($handle = fopen($filename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($i=0; $i < $num; $i++) {
                           $axis =  explode(" ", $data[$i]);
                           array_push($kpi5112,$axis[0]);
                        }
                    }
                    
                    fclose($handle);
                  }*/
		
	}

  if(!empty($_GET["done"]) && isset($_GET["done"]) )
    {
						if(!empty($_GET["lastev"]) && isset($_GET["done"])){
				$test = $kpi->calculateKPI(false)[0];

			}
			else{
				$test = $kpi->calculateKPI(true)[0];

			}

			$the_big_array = $test['the_big_array'];
			$csv0 = $test['csv0'];
			$csv1 = $test['csv1'];
			$csv2 = $test['csv2'];
			$csv3 = $test['csv3'];
			$csv4 = $test['csv4'];
			$csv010 = $test['csv5'];
			$csv110 = $test['csv6'];
            $data = [
                ["KPI_ID" => "GC5.3.1", "KPIvalue" => $the_big_array[0][0]],
                ["KPI_ID" => "GC5.3.2", "KPIvalue" => $the_big_array[1][0]],
                ["KPI_ID" => "GC5.3.3", "KPIvalue" => $the_big_array[2][0]],
                ["KPI_ID" => "GC5.3.4", "KPIvalue" => $the_big_array[3][0]],
                ["KPI_ID" => "GC5.5.1", "KPIvalue" => $the_big_array[4][0]],
                ["KPI_ID" => "GC5.5.2", "KPIvalue" => $the_big_array[5][0]],
                ["KPI_ID" => "GC5.5.3", "KPIvalue" => $the_big_array[6][0]],
                ["KPI_ID" => "GC5.5.4", "KPIvalue" => $the_big_array[7][0]],
                ["KPI_ID" => "GC5.5.5", "KPIvalue" => $the_big_array[8][0]],
                ["KPI_ID" => "GC5.5.6", "KPIvalue" => $the_big_array[9][0]],
                ["KPI_ID" => "GC5.4.1", "KPIvalue" => $the_big_array[10][0]],
                ["KPI_ID" => "GC5.13.1", "KPIvalue" => $the_big_array[11][0]],
                ["KPI_ID" => "GC5.13.2", "KPIvalue" => $the_big_array[12][0]],
                ["KPI_ID" => "GC5.13.3", "KPIvalue" => $the_big_array[13][0]],
                ["KPI_ID" => "GC5.10.1", "KPIvalue" => $the_big_array[14][0]],
                ["KPI_ID" => "GC5.10.2", "KPIvalue" => $the_big_array[15][0]],
                ["KPI_ID" => "GC5.14.1", "KPIvalue" => $the_big_array[16][0]]
            ];
            $xlsx = SimpleXLSXGen::fromArray( $data );
            $xlsx->saveAs('./kpi.xlsx');

			//$xaxis = $test['xaxis'];
			//$yaxis1 = $test['yaxis1'];
			//$yaxis2 = $test['yaxis2'];
			//$yaxis3 = $test['yaxis3'];
			$self_consumption_array = $test['self_consumption_array'];

        }


      ?>

	<script>
		if(window.location.href == "http://localhost:8080/dash2internal.php"){
		window.location.href = "http://localhost:8080/dash2internal.php?";}
		
	</script>

    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary2 p-0" style="background-color: #599f4f;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <img src="gc.png" alt="GreenCharge Logo" width="55" height="65">
                    <div class="sidebar-brand-text mx-3"><span>GreenCharge</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://localhost:8080/dash2internal.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://localhost:8080/history.php"><i class="fas fa-history"></i><span>Evaluation History</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://localhost:8080/dash2internal.php?done=true"><i class="fas fa-hand-point-left"></i><span>Last Evaluation</span></a></li>

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
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">GreenCharge Account</span><img class="border rounded-circle img-profile" src="assets/img/dogs/logo.png"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
				<i class="fas fa-globe-africa"></i>
				
				
				<div id="mySidenav" class="sidenav">
				  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				  <hr class="dashed">
			
							  <li>GC5.1.1</li>
				  <h1 > The number of EVs in general.</h1>
				  <hr class="dashed">
				  			  <li>GC5.1.2</li>
				  <h1 > The share of EVs in general. </h1>
				  <hr class="dashed">
				  			  <li>GC5.1.3</li>
				  <h1 > The share of private EVs. </h1>
				  <hr class="dashed">
				  			  <li>GC5.1.4</li>
				  <h1 > The share of EVs owned by e-sharing companies. </h1>
				  <hr class="dashed">
				  			  <li>GC5.1.5</li>
				  <h1 > The share of EVs that citizens plan to buy.</h1>
				  <hr class="dashed">
				  			  <li>GC5.2.1</li>
				  <h1 > The number of charging point (CPs) are already available for charging. </h1>
				  <hr class="dashed">
				  			  <li>GC5.2.2</li>
				  <h1 > The number of new CPs are installed. </h1>
				  <hr class="dashed">
				  			  <li>GC5.2.3</li>
				  <h1 > The number of CPs are private. </h1>
				  <hr class="dashed">
				  			  <li>GC5.2.4</li>
				  <h1 > The number of CPs are shared. </h1>
				  <hr class="dashed">
				  			  <li>GC5.2.5</li>
				  <h1 > The number of new CPs are planned to be installed in next time period. </h1>
				  <hr class="dashed">
				  			  <li>GC5.2.6</li>
				  <h1 > The share of parking spaces equipped with charging equipment. </h1>
				  <hr class="dashed">
				  			  <li>GC5.3.1</li>
				  <h1 > The time EVs are connected during a specific time span. </h1>
				  <hr class="dashed">
				  			  <li>GC5.3.2</li>
				  <h1 > The time the EVs are charging compared to the total connected time. </h1>
				  <hr class="dashed">
				  			  <li>GC5.3.3</li>
				  <h1 > The energy EVs are charged with per connected time unit. </h1>
				  <hr class="dashed">
				  			  <li>GC5.5.1</li>
				  <h1 > Waiting times. </h1>
				  <hr class="dashed">
				  			  <li>GC5.5.2</li>
				  <h1 > Energy transferred to the EV battery compared to energy demand. </h1>
				  <hr class="dashed">
				  			  <li>GC5.5.3</li>
				  <h1 > Share of CP booking requests when a CP is available according to request. </h1>
				  <hr class="dashed">
				  			  <li>GC5.5.4</li>
				  <h1 > Share of charging when EV is charged according to the charging demand.  </h1>
				  <hr class="dashed">
				  		      <li>GC5.4</li>
				  <h1 > Share of battery capacity for V2G. </h1>
				  <hr class="dashed">
				  			  <li>GC5.13.1</li>
				  <h1 > How much flexibility the EV user is willing to provide with respect to when the charging can be accomplished. </h1>
				  <hr class="dashed">
				  			  <li>GC5.13.2</li>
				  <h1 > The actual flexibility that the system could have utilised. </h1>
				  <hr class="dashed">
				  			  <li>GC5.13.3</li>
				  <h1 > How much flexibility the EV user is willing to provide with respect to V2G.  </h1>
				  <hr class="dashed">
				  			  <li>GC5.9</li>
				  <h1 > Energy Mix. </h1>
				  <hr class="dashed">
				  			  <li>GC5.10</li>
				  <h1 > Peak to average Ratio. </h1>
				  <hr class="dashed">
				  			  <li>GC5.14</li>
				  <h1 > Self-Consumption. </h1>
				  <hr class="dashed">
				  			  <li>GC5.6.1</li>
				  <h1 > Average operating costs. </h1>
				  <hr class="dashed">
				  			  <li>GC5.6.2</li>
				  <h1 > Average personnel costs. </h1>
				  <hr class="dashed">
				  			  <li>GC5.6.3</li>
				  <h1 > Average energy costs paid to RES producer. </h1>
				  <hr class="dashed">
				  			  <li>GC5.6.4</li>
				  <h1 > Average energy costs paid to DSO/TSO. </h1>
				  <hr class="dashed">
				  			  <li>GC5.6.5</li>
				  <h1 > Average maintenance costs  </h1>
				  <hr class="dashed">
				  			  <li>GC5.7</li>
				  <h1 > Total Capital Investment. </h1>
				  <hr class="dashed">
				  			  <li>GC5.8.1</li>
				  <h1 > Average operating revenues. </h1>
				  <hr class="dashed">
				  			  <li>GC5.8.2</li>
				  <h1 > Average operating revenues from residents. </h1>
				  <hr class="dashed">
				  			  <li>GC5.8.3</li>
				  <h1 > Average operating revenues from visitors. </h1>
				  <hr class="dashed">
				  			  <li>GC5.11.1</li>
				  <h1 > Average total cost per kWh in a period. </h1>
				  <hr class="dashed">
				  			  <li>GC5.11.2</li>
				  <h1 > Average cost linked to energy use in a period. </h1>
				  <hr class="dashed">
				  			  <li>GC5.11.3</li>
				  <h1 > Emissions. </h1>
				  <hr class="dashed">
				  			  <li>GC5.15.1</li>
				  <h1 > Average operating earnings (EBITDA). </h1>
				  <hr class="dashed">
				  			  <li>GC5.15.2</li>
				  <h1 > Earnings (Cash Flow). </h1>
				  <hr class="dashed">
				</div>
				
				<script>
				function openNav() {
				  document.getElementById("mySidenav").style.width = "230px";
				}

				/* Set the width of the side navigation to 0 */
				function closeNav() {
				  document.getElementById("mySidenav").style.width = "0";
				}</script>
				
				
				<style>
					/* The side navigation menu */
						.sidenav {
						  height: 100%; /* 100% Full-height */
						  width: 0; /* 0 width - change this with JavaScript */
						  position: fixed; /* Stay in place */
						  z-index: 1; /* Stay on top */
						  top: 0; /* Stay at the top */
						  left: 0;
						  background-color: #FFFFFF; /* Black*/
						  overflow-x: hidden; /* Disable horizontal scroll */
						  padding-top: 60px; /* Place content 60px from the top */
						  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
						}

						/* The navigation menu links */
						.sidenav a {
						  padding: 8px 8px 8px 32px;
						  text-decoration: none;
						  font-size: 25px;
						  color: #818181;
						  display: block;
						  transition: 0.3s;
						}

						.sidenav div {
						  padding: 0px 0px 8px 32px;
						  text-decoration: none;
						  font-size: 20px;
						  font-weight: bold;
						  color: #818181;
						  display: block;
						  transition: 0.3s;
						}
						.sidenav li {
						  padding: 0px 0px 8px 32px;
						  text-decoration: none;
						  font-size: 20px;
						  font-weight: bold;
						  color: #599F4F;
						  display: block;
						  transition: 0.3s;
						}
						.sidenav h1 {
						  padding: 0px 20px 8px 32px;
						  text-decoration: none;
						  font-size: 15px;
						  color: #818181;
						  display: block;
						  transition: 0.3s;
						}

						/* When you mouse over the navigation links, change their color */
						.sidenav a:hover {
						  color: #f1f1f1;
						}

						/* Position and style the close button (top right corner) */
						.sidenav .closebtn {
						  position: absolute;
						  top: 0;
						  right: 25px;
						  font-size: 36px;
						  margin-left: 50px;
						}

						/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
						#main {
						  transition: margin-left .5s;
						  padding: 20px;
						}

						/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
						@media screen and (max-height: 450px) {
						  .sidenav {padding-top: 15px;}
						  .sidenav a {font-size: 18px;}
						}
						.bd-example-modal-lg .modal-dialog{
							display: table;
							position: relative;
							margin: 0 auto;
							top: calc(50% - 24px);
						  }

						  .bd-example-modal-lg .modal-dialog .modal-content{
							background-color: transparent;
							border: none;
						  }
						  .modal-body {
							  display: flex;
							  align-items: center;
							  justify-content: center;
							}
						  </style>
										
				
						
		  <script language = "JavaScript">
					    var getParams = function (url) {
							var params = {};
							var parser = document.createElement('a');
							parser.href = url;
							var query = parser.search.substring(1);
							var vars = query.split('&');
							for (var i = 0; i < vars.length; i++) {
								var pair = vars[i].split('=');
								params[pair[0]] = decodeURIComponent(pair[1]);
							}
							return params;
						};
						var waitingDialog = waitingDialog || (function ($) {
						'use strict';

						// Creating modal dialog's DOM
						var $dialog = $(
						'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
						'<div class="modal-dialog modal-m">' +
						'<div class="modal-content">' +
							'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
							'<div class="modal-body ">' +	
							'<div class="spinner-border text-success" role="status" align="center"></div>'+
							
							'</div>' +
						'</div></div></div>');

						return {
						/**
						 * Opens our dialog
						 * @param message Custom message
						 * @param options Custom options:
						 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
						 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
						 */
						show: function (message, options) {
							// Assigning defaults
							if (typeof options === 'undefined') {
								options = {};
							}
							if (typeof message === 'undefined') {
								message = 'Loading';
							}
							var settings = $.extend({
								dialogSize: 'l',
								progressType: '',
								onHide: null // This callback runs after the dialog was hidden
							}, options);

							// Configuring dialog
							$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-lg');
							$dialog.find('.progress-bar').attr('class', 'progress-bar');
							if (settings.progressType) {
								$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
							}
							$dialog.find('h3').text(message);
							// Adding callbacks
							if (typeof settings.onHide === 'function') {
								$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
									settings.onHide.call($dialog);
								});
							}
							// Opening dialog
							console.log( 'i am here ');
							//$dialog.modal();
						},
						/**
						 * Closes dialog
						 */
						hide: function () {			
							//$dialog.modal('hide');
						}
						};

						})(jQuery);
						
						
						var getResponse = function () {
							var res = $.ajax({
								url: "http://parsec2.unicampania.it:5436/getstatus?loggedin="+<?php echo $_SESSION["id"]?>,
								async: false,
								dataType: 'json'
							}).responseJSON;
							if(res["isDone"]){	
							return true;
							}
							else{
								console.log("false");
								return getResponse();
							}
						};
						function sleep (time) {
						  return new Promise((resolve) => setTimeout(resolve, time));
						}
					    function modal(){
							waitingDialog.show('Fetching Data and Performing Calculation...');
							var params = getParams(window.location.href);
							params['lastday'] = '<?php echo $_SESSION["lastday"]?>';
							params['day'] = '<?php echo $_SESSION["day"]?>';
							params['locationid'] = '<?php echo $_SESSION["location_id"]?>';

							if(!("day" in params) || !("lastday" in params) || !("id_pilot" in params)){
								console.log('no data');
							}
							else{
							  var day = params["day"].split(" ");
							  var lastday = params["lastday"].split(" ");
							  var id_pilot = params["id_pilot"];
							  var locid = params["locationid"];
							  console.log("http://parsec2.unicampania.it:5437/newevaluation?day1="+String(day[0])+"&day2="+String(lastday[0])+"&id_pilot="+String(id_pilot)+"&loggedin="+<?php echo $_SESSION["id"]?>+"&month1="+String(day[1])+"&year1="+String(day[2])+"&month2="+String(lastday[1])+"&year2="+String(lastday[2])+"&locationid="+String(locid));
							    $.ajax({
									  url: "http://parsec2.unicampania.it:5437/newevaluation?day1="+String(day[0])+"&day2="+String(lastday[0])+"&id_pilot="+String(id_pilot)+"&loggedin="+<?php echo $_SESSION["id"]?>+"&month1="+String(day[1])+"&year1="+String(day[2])+"&month2="+String(lastday[1])+"&year2="+String(lastday[2])+"&locationid="+String(locid),
									  type: "GET",
									  success: function(result) {
										console.log(result);
									  },
									  error: function(error) {
										console.log(error);
									  }
									});
						    var isdone = false;
							var  w;
						    w = new Worker("./assets/js/worker2.js");
							w.postMessage(<?php echo $_SESSION["id"]?>);
                            
							w.onmessage = function(event){
								    
								    console.log(event.data);
									setTimeout(function () {
									sleep(5000).then(() => {
											$('.modal').modal('hide');
											window.location.replace("http://localhost:8080/dash2internal.php?done=true");
									})

								   }, 2000);
							};
								
						    }
						}
						var getBusinessParams = function (url) {
							var params = {};
							var parser = document.createElement('a');
							parser.href = url;
							var query = parser.search.substring(1);
							var vars = query.split('&');
							for (var i = 0; i < vars.length; i++) {
								var pair = vars[i].split('=');
								params[pair[0]] = decodeURIComponent(pair[1]);
							}
							return params;
						};
						var waitingBusinessDialog = waitingDialog || (function ($) {
						'use strict';

						// Creating modal dialog's DOM
						var $businessdialog = $(
						'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
						'<div class="modal-dialog modal-m">' +
						'<div class="modal-content">' +
							'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
							'<div class="modal-body ">' +	
							'<div class="spinner-border text-success" role="status" align="center"></div>'+
							
							'</div>' +
						'</div></div></div>');

						return {
						/**
						 * Opens our dialog
						 * @param message Custom message
						 * @param options Custom options:
						 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
						 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
						 */
						show: function (message, options) {
							// Assigning defaults
							if (typeof options === 'undefined') {
								options = {};
							}
							if (typeof message === 'undefined') {
								message = 'Loading';
							}
							var settings = $.extend({
								dialogSize: 'l',
								progressType: '',
								onHide: null // This callback runs after the dialog was hidden
							}, options);

							// Configuring dialog
							$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-lg');
							$dialog.find('.progress-bar').attr('class', 'progress-bar');
							if (settings.progressType) {
								$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
							}
							$dialog.find('h3').text(message);
							// Adding callbacks
							if (typeof settings.onHide === 'function') {
								$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
									settings.onHide.call($dialog);
								});
							}
							// Opening dialog
							$dialog.modal();
						},
						/**
						 * Closes dialog
						 */
						hide: function () {
							$dialog.modal('hide');
						}
						};

						})(jQuery);
						
						
						var getBusinessResponse = function () {
							var res = $.ajax({
								url: "http://parsec2.unicampania.it:5435/getbusinessstatus?loggedin="+<?php echo $_SESSION["id"]?>,
								async: false,
								dataType: 'json'
							}).responseJSON;
							if(res["isDone"]){	
							return true;
							}
							else{
								console.log("false");
								return getBusinessResponse();
							}
						};
					    function businessmodal(){
							
							waitingBusinessDialog.show('Fetching Data and Performing Calculation...');
							var params = getBusinessParams(window.location.href);


							if(!("loc" in params) || !("dem" in params) || !("busMonth" in params)){
								alert('no data');
							}
							else{
							    $.ajax({
									
									  url: "http://parsec2.unicampania.it:5435/newbusinessevaluation?loc="+String(params["loc"])+"&dem="+String(params["dem"])+"&busMonth="+String(params["busMonth"])+"&yearkpi="+String(params["yearkpi"])+"&loggedin="+<?php echo $_SESSION["id"]?>,
									  type: "GET",
									  success: function(result) {
										console.log(result);
									  },
									  error: function(error) {
										console.log(error);
										alert(error);
									  }
									});
						    var isdone = false;
							var  w;
						    w = new Worker("./assets/js/worker2.js");
							w.postMessage(<?php echo $_SESSION["id"]?>);
                            
							w.onmessage = function(event){
								    
								    console.log(event.data);
									  setTimeout(function () {
									$('.modal').modal('hide');
									
									window.location.replace("http://localhost:8080/dash2internal.php?done2=true");

								   }, 2000);
							};
								
						    }
							
						}
					 
		  </script>
                    <h3 class="text-dark mb-0">Dashboard</h3><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><a class="btn btn-success btn-sm d-none d-sm-inline-block" onclick="modal()" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Start Evaluator</a><a class="btn btn-primary btn-sm d-none d-sm-inline-block" onclick="#" role="button" href="https://parsec2.unicampania.it/~branco/gccalculator/csv/kpi/<?php echo str_replace(' ', '', $the_big_array[18][0]) ?>"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a><a class="btn btn-primary btn-sm d-none d-sm-inline-block" onclick="openNav()" role="button" href="#"><i class="fas fa-info-circle fa-sm text-white-50"></i> Show Help</a></div>
								<?php
				if(isset($_SESSION["day"])){ ?>
						<h5 class="text-dark mb-0">Starting Date: <?php echo($_SESSION["day"]);?></h5>
				<?php } 
				?>
				<?php
				if(isset($_SESSION["lastday"])){ ?>
						<h5 class="text-dark mb-0">Ending Date: <?php echo($_SESSION["lastday"]);?></h5>
				<?php } 
				?>
				<?php
				if(isset($_SESSION["id_pilot"])){ ?>
						<h5 class="text-dark mb-0">Pilot: <?php echo($pilotarr[$_SESSION["id_pilot"]]);?></h5>
				<?php } 
				?>
				<?php
				if(isset($_SESSION["location_id"])){ ?>
						<h5 class="text-dark mb-0">Location: <?php echo($_SESSION["location_id"]);?></h5>
				<?php } 
				?>
				<div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
					<div class="modal-dialog modal-dialog-centered justify-content-center" role="document" data-keyboard="false" data-backdrop="static">
						<span class="fa fa-spinner fa-spin fa-3x"></span>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Select Date Interval</span></div>
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend"><span class="input-group-text">Date</span></div><input class="form-control" type="text" id="datePicker" />


                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
									<form>
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Select Pilot & Location id</span></div>
                                              <select class="form-control" id="select_1" name="id_pilot">
                                                  <option  value = "1">OSL-D1</option>
                                                  <option  value = "2">OSL-D2</option>
                                                  <option  value = "3">OSL-D3</option>
                                                  <option  value = "4">BRE-D1</option>
                                                  <option  value = "5">BRE-D2</option>
                                                  <option  value = "6">BAR-D1</option>
                                                  <option  value = "7">BAR-D2</option>
                                                  <option  value = "8">BAR-D3</option>
                                                </select>

												<input type="number" min = '1' placeholder="Location id" name='location_id'/>
												<button type="submit" class="btn btn-primary">Submit</button>
															
													    
                                    </div>
									</form>

                                    <!--<div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>--*-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."><span>GC5.3.1</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=1){echo $the_big_array[0][0];}else{echo '0';}?>%</span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=1){echo $the_big_array[0][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=1){echo $the_big_array[0][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                      <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>GC5.3.2</span></div>
                                      <div class="row no-gutters align-items-center">
                                          <div class="col-auto">
                                              <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=2){echo $the_big_array[1][0];}else{echo '0';}?>%</span></div>
                                          </div>
                                          <div class="col">
                                              <div class="progress progress-sm">
                                                  <div class="progress-bar bg-danger" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=2){echo $the_big_array[1][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=2){echo $the_big_array[1][0];}else{echo '0';}?>%</span></div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <!--<div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-primary py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>GC5.3.3</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=3){echo $the_big_array[2][0];}else{echo '0';}?></span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>GC5.3.4</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=4){echo $the_big_array[3][0];}else{echo '0';}?></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(count($the_big_array)>=4){echo $the_big_array[3][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=4){echo $the_big_array[3][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>GC5.5.1</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=5){echo $the_big_array[4][0];}else{echo '0';}?></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=5){echo $the_big_array[4][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=5){echo $the_big_array[4][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                      <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>GC5.5.2</span></div>
                                      <div class="row no-gutters align-items-center">
                                          <div class="col-auto">
                                              <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=6){echo $the_big_array[5][0];}else{echo '0';}?>%</span></div>
                                          </div>
                                          <div class="col">
                                              <div class="progress progress-sm">
                                                  <div class="progress-bar bg-danger" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=6){echo $the_big_array[5][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=6){echo $the_big_array[5][0];}else{echo '0';}?>%</span></div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  <!--  <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-primary py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>GC5.5.3</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=3){echo $the_big_array[6][0];}else{echo '0';}?></span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>GC5.5.4</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=7){echo $the_big_array[7][0];}else{echo '0';}?>%</span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(count($the_big_array)>=7){echo $the_big_array[7][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=7){echo $the_big_array[7][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>GC5.5.5</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=8){echo $the_big_array[8][0];}else{echo '0';}?>%</span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=8){echo $the_big_array[8][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=8){echo $the_big_array[8][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                      <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>GC5.5.6</span></div>
                                      <div class="row no-gutters align-items-center">
                                          <div class="col-auto">
                                              <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=9){echo $the_big_array[9][0];}else{echo '0';}?> min</span></div>
                                          </div>
                                          <div class="col">
                                              <div class="progress progress-sm">
                                                  <div class="progress-bar bg-danger" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=9){echo $the_big_array[9][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=9){echo $the_big_array[9][0];}else{echo '0';}?> min</span></div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  <!--  <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-primary py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>GC5.4.1</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=3){echo $the_big_array[10][0];}else{echo '0';}?></span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>GC5.13.1</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=7){echo $the_big_array[11][0];}else{echo '0';}?></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(count($the_big_array)>=7){echo $the_big_array[11][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=7){echo $the_big_array[11][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>GC5.13.2</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=8){echo $the_big_array[12][0];}else{echo '0';}?></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=8){echo $the_big_array[12][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=8){echo $the_big_array[12][0];}else{echo '0';}?>%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                      <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>GC5.13.3</span></div>
                                      <div class="row no-gutters align-items-center">
                                          <div class="col-auto">
                                              <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php if(count($the_big_array)>=9){echo $the_big_array[13][0];}else{echo '0';}?></span></div>
                                          </div>
                                          <div class="col">
                                              <div class="progress progress-sm">
                                                  <div class="progress-bar bg-danger" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php if(count($the_big_array)>=9){echo $the_big_array[13][0];}else{echo '0';}?>%;"><span class="sr-only"><?php if(count($the_big_array)>=9){echo $the_big_array[13][0];}else{echo '0';}?>%</span></div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  <!--  <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					<div class="row">
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-primary py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>GC5.10.1</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=14){echo $the_big_array[14][0].'';}else{echo '0';}?></span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-success py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>GC5.10.2 (Average Power)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=15){echo $the_big_array[15][0].' kW';}else{echo '0 kW';}?> kW</span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-info py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Pmax</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=16){echo $the_big_array[16][0];}else{echo '0';}?> Kw</span></div>
                                  </div>
                                  
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-danger py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>Peak Time</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=17){echo $the_big_array[17][0];}else{echo '0';}?></span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
					<div class="row">
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-primary py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>GC5.14.1</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=14){echo $the_big_array[18][0].'';}else{echo '0';}?>%</span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-xl-3 mb-4">
                      <div class="card shadow border-left-success py-2">
                          <div class="card-body">
                              <div class="row align-items-center no-gutters">
                                  <div class="col mr-2">
                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>GC5.14.2</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(count($the_big_array)>=15){echo $the_big_array[19][0].' ';}else{echo '0 kW';}?>%</span></div>
                                  </div>
                                <!--  <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> -->
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">GC5.14 - Self-Consumption</h6>
                    </div>
                    <div class="card-body">
                      <div class="col-md-12"><canvas id="myChart2" ></canvas></div>
                    </div>
                                              <script type="text/javascript">
                                              var xaxis = <?php echo json_encode($csv0);?>;
                                              // For drawing the lines
                                              var yaxis = <?php echo json_encode($csv1);?>;
                                              // For drawing the lines
                                              var yaxis2 = <?php echo json_encode($csv2);?>;
                                              // For drawing the lines
                                              var yaxis3 = <?php echo json_encode($csv3);?>;
                                              var yaxis4 = <?php echo json_encode($csv4);?>;
											

											

                                              var ctx = document.getElementById("myChart2");

                                              var myLineChart = new Chart(ctx, {
                                                  type: 'line',
			
							 options: {
										responsive: true,
										   elements: {
											point:{
												radius: 0
											}
										},
										scales: {
										  yAxes: [{
											id: 'A',
											type: 'linear',
											position: 'left',
											scaleLabel: {
												display: true,
												labelString: 'kW'
											  }
										  }, {
											id: 'B',
											type: 'linear',
											position: 'right',
											ticks: {
											  max: 1,
											  min: 0
											},
											scaleLabel: {
												display: true,
												labelString: 'Self-Consumption Value'
											  }
										  }]
										}
									  },
                             data: {
                                                  labels: xaxis,
                             datasets: [{
													  label: "Consumption",
													  yAxisID: 'A',
													  data: yaxis,
													  backgroundColor: [
													  'rgba(255,255,255, .0)',
													  ],
													  borderColor: [
													  'rgba(210,0,0, .7)',
													  ],
													  borderWidth: 2
													  },

												  {
													  label: "Local Production",
													  yAxisID: 'A',

													  data: yaxis2,
													  backgroundColor: [
													  'rgba(255,255,255, .0)',
													  ],
													  borderColor: [
													  'rgba(46,232,0, .7)',
													  ],
													  borderWidth: 2
                                                  },
                                                  {
													  label: "Grid Consumption",
													  yAxisID: 'A',

													  data: yaxis3,
													  backgroundColor: [
													  'rgba(255,255,255, .0)',
													  ],
													  borderColor: [
													  'rgba(10,108,255, .7)',
													  ],
													  borderWidth: 2
                                                }/*, 
												{
                                                  label: "Self Consumption",
												  yAxisID: 'B',

                                                  data: yaxis4,
                                                  backgroundColor: [
                                                  'rgba(255,255,255, .0)',
                                                  ],
                                                  borderColor: [
                                                  'rgba(243,156,18, .7)',
                                                  ],
                                                  borderWidth: 2
                                                  }*/
                                                  ]
                                                  }
                                                  
                                                  });



                                                </script>
                            <div id="chart_div" style="height: 370px; width: 100%;"></div>

                    </div>
                </div>

           </div>
		   
		   
		   
		   
		   
		   
		      <div class="row">
            <div class="col-lg-7 col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">GC5.14 - Self-Consumption</h6>
                    </div>
                    <div class="card-body">
                      <div class="col-md-12"><canvas id="sss" ></canvas></div>
                    </div>
                                              <script type="text/javascript">
                                              var xaxis2 = <?php echo json_encode($csv010);?>;
                                              // For drawing the lines
                                              var yaxis23 = <?php echo json_encode($csv110);?>;
                                              var yaxis24 = <?php echo json_encode($csv1);?>;

											



                                              var ctx2 = document.getElementById("sss");

                                              var myLineChart2 = new Chart(ctx2, {
                                                  type: 'line',
			
							 options: {
										responsive: true,
										   elements: {
											point:{
												radius: 0
											}
										},
										scales: {
										  yAxes: [{
											id: 'A',
											type: 'linear',
											position: 'left',
											scaleLabel: {
												display: true,
												labelString: 'kW'
											  }
										  }, {
											id: 'B',
											type: 'linear',
											position: 'right',
											
											scaleLabel: {
												display: true,
												labelString: 'Peak On Average (Natural Number)'
											  }
										  }]
										}
									  },
                             data: {
                                                  labels: xaxis2,
                             datasets: [{
													  label: "Peak On Average",
													  yAxisID: 'B',
													  data: yaxis23,
													  backgroundColor: [
													  'rgba(255,255,255, .0)',
													  ],
													  borderColor: [
													  'rgba(210,0,0, .7)',
													  ],
													  borderWidth: 2
													  }

											, 
												{
                                                  label: "Consumption",
												  yAxisID: 'A',

                                                  data: yaxis24,
                                                  backgroundColor: [
                                                  'rgba(255,255,255, .0)',
                                                  ],
                                                  borderColor: [
                                                  'rgba(243,156,18, .7)',
                                                  ],
                                                  borderWidth: 2
                                                  }
                                                  ]
                                                  }
                                                  
                                                  });



                                                </script>
                            <div id="chart_div" style="height: 370px; width: 100%;"></div>

                    </div>
                </div>

           </div>
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		<div class="row">
            <div class="col-lg-7 col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">TESTGRAPH1</h6>
                    </div>
                    <div class="card-body">
					<div class="row">
					           
								      <div class="dropdown" style="padding-left:20px "><button class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="filter: blur(0px) brightness(81%) contrast(96%);">Select Location </button>
                              <div
                                  class="dropdown-menu" role="menu">

            
                                       <a class="dropdown-item" role="presentation" onclick="myFunction2('Oslo')"  >Oslo</a>
                                       <a class="dropdown-item" role="presentation" onclick="myFunction2('Bremen')"  >Bremen</a>
                                       <a class="dropdown-item" role="presentation" onclick="myFunction2('Barcelona')"  >Barcelona</a>

							<script>
								var loc = 0;
								var dem = 0;
								function myFunction2(element) {
									loc = String(element);
									//window.location.href = window.location.href+"&loc="+ String(element);					
								}
							</script>


                      </div>

                  </div>      
				  <div class="dropdown" style="padding-left:20px "><button class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="filter: blur(0px) brightness(81%) contrast(96%);">Select Demo </button>
                              <div
                                  class="dropdown-menu" role="menu">
										<a class="dropdown-item" role="presentation" onclick="myFunction3('D1')"  >D1</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction3('D2')"  >D2</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction3('D3')"  >D3</a>

							<script>
								function myFunction3(element) {
									dem = String(element);
									//window.location.href = window.location.href+"&dem="+ String(element);					
								}
							</script>


                      </div>

                  </div>
				    <div class="dropdown" style="padding-left:20px "><button class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="filter: blur(0px) brightness(81%) contrast(96%);">Select Month </button>
                              <div
                                  class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('13')"  >All</a>
										<a class="dropdown-item" role="presentation" onclick="myFunction5('1')"  >January</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('2')"  >February</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('3')"  >March</a>
										<a class="dropdown-item" role="presentation" onclick="myFunction5('4')"  >April</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('5')"  >May</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('6')"  >June</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('7')"  >July</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('8')"  >August</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('9')"  >September</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('10')"  >October</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('11')"  >November</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction5('12')"  >December</a>
							<script>
								function myFunction5(element) {
									month = String(element);
									//window.location.href = window.location.href+"&dem="+ String(element);					
								}
							</script>


                      </div>

                  </div>
				   <div class="dropdown" style="padding: 0px 20px 0px 20px "><button class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="filter: blur(0px) brightness(81%) contrast(96%);">Select Year </button>
                              <div
                                  class="dropdown-menu" role="menu">
										<a class="dropdown-item" role="presentation" onclick="myFunction4('2019')"  >2019</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction4('2020')"  >2020</a>
                                        <a class="dropdown-item" role="presentation" onclick="myFunction4('2021')"  >2021</a>
										<a class="dropdown-item" role="presentation" onclick="myFunction4('2019-2020')"  >2019-2020</a>
										<a class="dropdown-item" role="presentation" onclick="myFunction4('2020-2021')"  >2020-2021</a>
										<a class="dropdown-item" role="presentation" onclick="myFunction4('2019-2020-2021')"  >2019-2020-2021</a>

							<script>
								function myFunction4(element) {
									var baseurl = window.location.origin+window.location.pathname;
									console.log(baseurl);
									if(window.location.href.endsWith('?')){		
										window.location.href = baseurl+"?loc="+loc+"&dem="+dem+"&busMonth="+month+"&yearkpi="+String(element) ;
									}
									else if(window.location.href.includes('dem')){
										window.location.href = baseurl+"?loc="+loc+"&dem="+dem+"&busMonth="+month+"&yearkpi="+String(element) ;
									}
									else{
										window.location.href = window.location.href+"loc="+loc+"&busMonth="+month+"&dem="+dem+"&yearkpi="+String(element) ;
									}
								}
							</script>
						
                      </div> 
						<div class="btn btn-success btn-sm d-none d-sm-inline-block" onclick="businessmodal()" role="button" href="#" ><i class="fas fa-download fa-sm text-white-50"></i> Start Evaluator</div> 
                  </div>
				                   

							</div>
							<div class ="row">
              	<script>
								function FunctionMonth(element) {
									
									dem = String(element);
									window.location.href = window.location.href+"&dem="+ String(element);					
								}
				</script>
			  
			  
			  
              <div id = "container" style = "width: 90%; height: 600px; margin: 0 auto"></div>

				  <script language = "JavaScript">
					 $(document).ready(function() {  
						var chart = {      
						   type: 'column',
						   marginTop: 40,
						   marginRight: 40,
						       style: {
									fontFamily: ' "\"Lucida Grande\"'
								},
								
						   options3d: {
							  enabled: true,
							  alpha: 0,
							  beta: 0,
						
							  viewDistance: 25,
							  depth: 50,
							      viewDistance: 10,
								frame: {
									bottom: {
										size: 1,
										color: 'rgba(0,0,0,0.05)'
									}
								}
						   }
						};
						var title = {
						   text: 'KPI Calculated, Grouped By Month (click on Legend to Hide/Show Series)'   
						};   
						var xAxis = {
						   categories: [<?php echo(join($months, ',')); ?>],
						    max: 11,
							scrollbar: {
									enabled: true
						}

						};
						var yAxis = {
						   allowDecimals: false,
						   min: 0,
						   title: {
							  text: 'KPI Value (n°)'
						   }
						};  
						var zAxis = {
						   allowDecimals: false,
						   min: 0
						};  
				
						var plotOptions = {
						   column: {
							  stacking: 'normal',
							  depth: 20
						   }

						};
						
						var scrollbar = {
							  scrollbar: {
									enabled: true
						}};
						
						var series = [{
							  name: 'GC 5.1.1',
							  data: [<?php echo(join($kpi511, ',')); ?>],
							  stack: '1',
							  color: '#4e73df'

						   }, {
							  name: 'GC 5.2.1',
							  data: [<?php echo(join($kpi521, ',')); ?>],
							  stack: '2',
							  color: '#1cc88a'

						   }, {
							  name: 'GC 5.2.2',
							  data: [<?php echo(join($kpi522, ',')); ?>],
							  stack: '3',
							  color: '#36b9cc'
						   }, {
							  name: 'GC 5.2.3',
							  data: [<?php echo(join($kpi523, ',')); ?>],
							  stack: '4',
							  color: '#f6c23e'
						   },
						   {
							  name: 'GC 5.2.4',
							  data: [<?php echo(join($kpi524, ',')); ?>],
							  stack: '6',
							  color: '#e74a3b'
						   }
						];
							var credits= {
								enabled: false
							};
					 
						var json = {};   
						json.chart = chart; 
						json.title = title;      
						json.xAxis = xAxis;
						json.credits = credits;
						json.yAxis = yAxis;
						json.zAxis = zAxis;
						//json.tooltip = tooltip; 
						json.plotOptions = plotOptions; 
						json.series = series;
						$('#container').highcharts(json);
					 });
					

					 
				  </script>

						                    </div>
			  

                    </div>
                </div>
        
           </div>   
		   
		   
		   
		   
        
        </div>
		
		
			<div class="row">
			
            <div class="col-lg-7 col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">TESTGRAPH2</h6>
                    </div>
                    <div class="card-body">
              <div id = "container2" style = "width: 90%; height: 600px; margin: 0 auto"></div>

				  <script language = "JavaScript">
					 $(document).ready(function() {  
						var chart = {      
						   type: 'column',
						   marginTop: 40,
						   marginRight: 40,
						    
						    style: {
									fontFamily: ' "\"Lucida Grande\"',
								},
						   options3d: {
							  enabled: true,
							  alpha: 0,
							  beta: 0,
							  viewDistance: 25,
							  depth: 50,
							
							      viewDistance: 10,
								frame: {
									bottom: {
										size: 1,
										color: 'rgba(0,0,0,0.05)'
									}
								}
						   }
						};
						var title = {
						   text: 'KPI Calculated, Grouped By Month (click on Legend to Hide/Show Series)'   
						};   
						var xAxis = {
						   categories: [<?php echo(join($months, ',')); ?>],
						    max: 11,
							scrollbar: {
									enabled: true
						}}
						var yAxis = {
						   allowDecimals: false,
						  
						   title: {
							  text: 'KPI Value (€)'
							  
						   }
						};  
						var zAxis = {
						   allowDecimals: false,
						   min: 0
						};  

						

						var plotOptions = {
						   column: {
							  stacking: 'normal',
							  depth: 40
						   }
						};   
						
						var credits= {
								enabled: false
							};
						
						
						var series = [{
							  name: 'GC 5.6.1',
							  data: [<?php echo(join($kpi56, ',')); ?>],
							  stack: '1',
							  color: '#4e73df',
						   }, {
							  name: 'GC 5.7.1',
							  data: [<?php echo(join($kpi57, ',')); ?>],
							  stack: '2',
							  color: '#1cc88a'

						   }, {
							  name: 'GC 5.8.1',
							  data: [<?php echo(join($kpi581, ',')); ?>],
							  stack: '3',
							  color: '#36b9cc'

						   }, {
							  name: 'GC 5.11.1',
							  data: [<?php echo(join($kpi5111, ',')); ?>],
							  stack: '4',
							  color: '#f6c23e'

						   },
						   {
							  name: 'GC 5.11.2',
							  data: [<?php echo(join($kpi5112, ',')); ?>],
							  stack: '5',
							  color: '#f6c23e'

						   }
						   
						   
						];
					 
						var json = {};   
						json.chart = chart; 
						json.title = title;      
						json.xAxis = xAxis; 
						json.yAxis = yAxis;
						json.credits = credits;
						json.zAxis = zAxis;
						//json.tooltip = tooltip; 
						json.plotOptions = plotOptions; 
						json.series = series;
						$('#container2').highcharts(json);
						
					 });
				  </script>

									  

                    </div>
                </div>
        
           </div>   
		   
		   
		   
		   
        
        </div>
		
			<div class="row">
			
            <div class="col-lg-7 col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">TESTGRAPH3</h6>
                    </div>
                    <div class="card-body">
              <div id = "container3" style = "width: 90%; height: 600px; margin: 0 auto"></div>

				  <script language = "JavaScript">
					 $(document).ready(function() {  
						var chart = {      
						   type: 'column',
						   marginTop: 40,
						   marginRight: 40,
						    
						    style: {
									fontFamily: ' "\"Lucida Grande\"',
								},
						   options3d: {
							  enabled: true,
							  alpha: 0,
							  beta: 0,
							  viewDistance: 25,
							  depth: 50,
							
							      viewDistance: 10,
								frame: {
									bottom: {
										size: 1,
										color: 'rgba(0,0,0,0.05)'
									}
								}
						   }
						};
						var title = {
						   text: 'KPI Calculated, Grouped By Month (click on Legend to Hide/Show Series)'   
						};   
						var xAxis = {
						   categories: [<?php echo(join($months, ',')); ?>],
						    max: 11,
							scrollbar: {
									enabled: true
						}}
						var yAxis = {
						   allowDecimals: false,
						   min: 0,
						   title: {
							  text: 'KPI Value (%)'
							  
						   }
						};  
						var zAxis = {
						   allowDecimals: false,
						   min: 0
						};  


						var plotOptions = {
						   column: {
							  stacking: 'normal',
							  depth: 40
						   }
						};   
						
						var credits= {
								enabled: false
							};
						
						
						var series = [{
							  name: 'GC 5.1.2',
							  data: [<?php echo(join($kpi512, ',')); ?>],
							  stack: '1',
							  color: '#4e73df',
						   }, {
							  name: 'GC 5.1.3',
							  data: [<?php echo(join($kpi513, ',')); ?>],
							  stack: '2',
							  color: '#1cc88a'

						   }, {
							  name: 'GC 5.2.4',
							  data: [<?php echo(join($kpi514, ',')); ?>],
							  stack: '3',
							  color: '#36b9cc'

						   }, {
							  name: 'GC 5.1.5',
							  data: [<?php echo(join($kpi515, ',')); ?>],
							  stack: '4',
							  color: '#f6c23e'

						   }
						];
					 
						var json = {};   
						json.chart = chart; 
						json.title = title;      
						json.xAxis = xAxis; 
						json.yAxis = yAxis;
						json.credits = credits;
						json.zAxis = zAxis;
						//json.tooltip = tooltip; 
						json.plotOptions = plotOptions; 
						json.series = series;
						$('#container3').highcharts(json);
						
					 });
				  </script>

									  

                    </div>
                </div>
        
           </div>   
		   
		   
		   
		   
        
        </div>
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
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
