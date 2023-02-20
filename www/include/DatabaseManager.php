<?php
include("mysql-fix.php");
include("DatabaseConfig.php");
class DatabaseManager {

    private $link;
    private $host, $username, $password, $database;

    public function __construct(){
        $this->host        = DBHOST;
        $this->username    = DBUSER;
        $this->password    = DBPWD;
        $this->database    = DBNAME;

        $this->link = mysqli_connect($this->host, $this->username,
         $this->password, $this->database)
            OR die("Problema di connessione al database!");

        //mysqli_select_db($this->database, $this->link)
        //    OR die("Problema nella selezione del database!");
        return true;
    }

    public function query($query) {
        $stmt = mysqli_query($this->link,$query);
        return $stmt;
    }

   public function getCSVList(){
   return $this->query("SELECT * FROM CSV");
   }

   public function checkUsername($username){
     $exist = FALSE;
      $stmt = mysqli_prepare($this->link, "SELECT id FROM users WHERE email = ?");
      mysqli_stmt_bind_param($stmt, "s", $username);
      if(mysqli_stmt_execute($stmt)){
          /* store result */
          mysqli_stmt_store_result($stmt);

          if(mysqli_stmt_num_rows($stmt) == 1){
              $exist = TRUE;
          }
      mysqli_stmt_close($stmt);

   return $exist;
 }}


   public function createUser($jid, $port, $email, $password){
           $loginsucc = FALSE;

           $sql = "INSERT INTO users (email, password, jid, adaptor_port) VALUES (?, ?, ?, ?)";
           $stmt = mysqli_prepare($this->link, $sql);
           mysqli_stmt_bind_param($stmt, "ssss", $email, $password,$jid, $port);
           if(mysqli_stmt_execute($stmt)){
             $loginsucc = TRUE;

           }
           mysqli_stmt_close($stmt);

   return $loginsucc;
   }

   public function createHistory($id, $startday, $endday, $pilot_id, $filename){
			$stored = FALSE;
           $sql = "INSERT INTO history (userId, firstDay, endDay, pilotId,filename) VALUES (?, ?, ?, ?,?)";
           $stmt = mysqli_prepare($this->link, $sql); 
		   $fil = str_replace(' ', '', $filename);
           mysqli_stmt_bind_param($stmt, "sssss", $id, $startday,$endday, $pilot_id, $fil);
           if(mysqli_stmt_execute($stmt)){
             $stored = TRUE;

           }
           mysqli_stmt_close($stmt);

   return $stored;
   }

   public function getHistory($id){
			 $result1 =  mysqli_query($this->link,"SELECT * FROM history where userId = ".$id);
			

			return $result1;
   }



      public function loginUser($email, $password){
              $loginsucc = 0;

              $sql = "SELECT id, email, password FROM users WHERE email = ?";
              $stmt = mysqli_prepare($this->link, $sql);
              mysqli_stmt_bind_param($stmt, "s", $email);
              if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                       mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                       if(mysqli_stmt_fetch($stmt)){
                           if(password_verify($password, $hashed_password)){
                                  $loginsucc = 3;
                           }
                    }
                }else{
                  $loginsucc = 2;

                }
              }
              else{
                $loginsucc = 1;

              }
              mysqli_stmt_close($stmt);

      return $loginsucc;
      }





   public function getCSV($id){
   $result =  $this->query("SELECT * FROM CSV where id=".$id);
   return mysqli_fetch_object($result);
   }

   public function getSimulationIds($day){
     $month = 0;
     if($day[1] == 'January'){
       $month = 1;
     }
     elseif($day[1] == 'February'){
       $month = 2;
     }
     elseif($day[1] == 'March'){
       $month = 3;
     }
     elseif($day[1] == 'April'){
       $month = 4;
     }
     elseif($day[1] == 'May'){
       $month = 5;
     }
     elseif($day[1] == 'June'){
       $month = 6;
     }
     elseif($day[1] == 'July'){
       $month = 7;
     }
     elseif($day[1] == 'August'){
       $month = 8;
     }
     elseif($day[1] == 'September'){
       $month = 9;
     }
     elseif($day[1] == 'October'){
       $month = 10;
     }
     elseif($day[1] == 'November'){
       $month = 11;
     }
     elseif($day[1] == 'December'){
       $month = 12;
     }


     $res = [];

   $result1 =  mysqli_query($this->link,"SELECT id FROM Simulations where day=".$day[0]." AND month=".$month." AND year=".$day[2]);
   $row2 = mysqli_fetch_assoc($result1);
   if(!empty($row2["id"])){
     $result =  mysqli_query($this->link,"SELECT id_sim FROM SimulationCouple where id_giorno=".$row2["id"]);
     return $result;
   }



   }


    public function __destruct() {
        mysqli_close($this->link)
            OR die("Problema nella disconnessione dal database!");
    }

    public function getpath($id_sim){

      $result =  mysqli_query($this->link,"SELECT * FROM SimulationCouple where id_sim=".$id_sim);
      $row2 = mysqli_fetch_assoc($result);

      return $row2["path"];
    }

    public function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }


}













?>
