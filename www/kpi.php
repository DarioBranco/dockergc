<?php

class Kpi {
	public $db;
	function __construct() {
      	  $this->db = new DatabaseManager();

    }
	public function calculateKPI($history_flag){

      //$filename = 'csv/kpi/'.$_SESSION["id2"].'_selfconsumption.csv';

      $self_consumption_array = [];

      //if (($h = fopen("{$filename}", "r")) !== FALSE)
      //{

      //  while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
     //   {
     //     $self_consumption_array[] = $data;
     //   }

      //  fclose($h);
      //}

      $filename = './csv/kpi/'.$_SESSION["id2"].'_kpi.csv';

      $the_big_array = [];
      if (($h = fopen("{$filename}", "r")) !== FALSE)
      {
        while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
        {
          $the_big_array[] = $data;
        }
        fclose($h);
      }
	    if($history_flag){
			    $this->db->createHistory($_SESSION["id2"], strval($_SESSION["day"]), strval($_SESSION["lastday"]), strval($_SESSION["id_pilot"]), strval($the_big_array[17][0]));
		}

        $csv0 = array();

        $csv1 = array();
		
        $csv010 = array();

        $csv110 = array();
        $csv2 = array();
        $csv3 = array();
        $csv4 = array();
        $countrighe = 0;
        $countElem = 0;

        $files = glob("csv/kpi/.csv");
    
		if (($handle = fopen("csv/kpi/".$_SESSION["id2"]."1.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
					$axis =  explode(" ", $data[$i]);
					$temp = 0;
					if($i == 0){
						$temp = (int)$axis[0];
					}
					else{
						if((int)$axis[0] <= $temp){
							echo('ERRORE!!!!');
						}
						else{
							echo('TUTTO OK!!!!');

						}
													print_r(' ');

					}
				    array_push($csv0,$axis[0]);
				    array_push($csv1,$axis[1]);
					}
				}
				fclose($handle);
			    } else {
				  echo "Could not open file: " . $file;
			    }
	
		if (($handle = fopen("csv/kpi/".$_SESSION["id2"]."kpi510.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
					$axis =  explode(" ", $data[$i]);
				    array_push($csv010,date("Y/m/d H:m:s",(int)$axis[0]));
				    array_push($csv110,$axis[1]);
					}
				}
				fclose($handle);
			    } else {
				  echo "Could not open file: ";
			    }
				
				

				
				
		if (($handle = fopen("csv/kpi/".$_SESSION["id2"]."2.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
				   $axis =  explode(" ", $data[$i]);
				   array_push($csv2,$axis[1]);
				}
			}
			fclose($handle);
			} else {
			  echo "Could not open file: " . $file;
			}
		  

		  
		if (($handle = fopen("csv/kpi/".$_SESSION["id2"]."3.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
				   $axis =  explode(" ", $data[$i]);
				   array_push($csv3,$axis[1]);
				}
			}
			fclose($handle);
			} else {
			  echo "Could not open file: " . $file;
			}

		  
		if (($handle = fopen("csv/kpi/".$_SESSION["id2"]."4.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
				   $axis =  explode(" ", $data[$i]);
				   array_push($csv4,$axis[1]);
				}
			}
			fclose($handle);
			} else {
			  echo "Could not open file: " . $file;
			}

              

        
        /*$resultList = array_diff(scandir("csv/sim1_1/hcprofiles/"), array('..', '.'));
          $xaxis = array();
          $yaxis1 = array();
          $yaxis2 = array();
          $yaxis3 = array();
        if(!empty($_GET["id_hcprofile"]) && isset($_GET["id_hcprofile"])){


          $path = "csv/sim1_1/hcprofiles/hcprofile.csv";
          if (($handle = fopen($path, "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
              $num = count($data);
              for ($i=0; $i < $num; $i++) {
                 $axis =  explode(" ", $data[$i]);
                 array_push($xaxis,date("H/i",(int)$axis[0]));
                 array_push($yaxis1,$axis[1]);
                 $sum = $axis[1]+$axis[2];
                 $min = $axis[1]-$axis[2];
                 array_push($yaxis2,$sum);
                 array_push($yaxis3,$min);
              }
          }
          fclose($handle);

        }
          }*/
		  $test = array();
		  //array_push($test, array('the_big_array' => $the_big_array, 'self_consumption_array' => $self_consumption_array, 'xaxis' => $xaxis, 'yaxis1' => $yaxis1, 'yaxis2' => $yaxis2, 'yaxis3' => $yaxis3, 'csv0' => $csv0, 'csv1' => $csv1, 'csv2' => $csv2, 'csv3' => $csv3, 'csv4' => $csv4)); 
		  array_push($test, array('the_big_array' => $the_big_array, 'self_consumption_array' => $self_consumption_array, 'csv0' => $csv0, 'csv1' => $csv1, 'csv2' => $csv2, 'csv3' => $csv3, 'csv4' => $csv4,'csv5' => $csv010, 'csv6' => $csv110 )); 

		  return $test;
	}

}

?>
