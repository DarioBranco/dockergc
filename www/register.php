
<?php
include("include/DatabaseManager.php");
$db = new DatabaseManager();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - GreenCharge Visualization and Evaluation Tool</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="bg-gradient-primary">


  <?php
  // Include config file

  // Define variables and initialize with empty values
  $username = $password = $confirm_password = $jid = $port = "";
  $username_err = $password_err = $confirm_password_err = $jid_err = $port_err = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Processing form data when form is submitted
      // Validate username
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter a email.";
      } else{
           $username = trim($_POST["username"]);
         }
          if($db->checkUsername($username)){
              } else{
                // Validate password
                if(empty(trim($_POST["jid"]))){
                    $jid_err = "Please enter a jid.";
                  }
                else{
                  $jid = trim($_POST["jid"]);
                }

                if(empty(trim($_POST["port"]))){
                    $port_err = "Please enter a port.";
                  }
                else{
                  $port = trim($_POST["port"]);
                }



                if(empty(trim($_POST["password"]))){
                    $password_err = "Please enter a password.";
                } elseif(strlen(trim($_POST["password"])) < 6){
                    $password_err = "Password must have atleast 6 characters.";
                } else{
                    $password = trim($_POST["password"]);
                }

                // Validate confirm password
                if(empty(trim($_POST["confirm_password"]))){
                    $confirm_password_err = "Please confirm password.";
                } else{
                    $confirm_password = trim($_POST["confirm_password"]);
                    if(empty($password_err) && ($password != $confirm_password)){
                        $confirm_password_err = "Password did not match.";
                    }
                }

                // Check input errors before inserting in database
                if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                        // Attempt to execute the prepared statement
                        echo(trim($_POST["jid"]));
                        echo(trim($_POST["port"]));

                        if($db->createUser(trim($_POST["jid"]), trim($_POST["port"]), $param_username, $param_password)){
                            header("location: index.php");
                            $usern = explode("@",$param_username);
			    echo($usern[0]);
			    
                            
			    $output = shell_exec('docker exec adaptor2 prosodyctl register '.$usern[0].' '.$usern[1].' '.$param_password);
			    error_log("ciaociao".$output);
			} else{
                            
                            echo "Oops! Something went wrong. Please try again later.";

                        }
                }



          }
        }


  ?>











    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-repeat: no-repeat;
                                                                          background-size: 50%;
                                                                          background-position: center; background-image: url(&quot;assets/img/dogs/logo.png&quot;);"></div>
                    </div>


                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group row <?php echo (!empty($port_err) || !empty($jid_err)) ? 'has-error' : ''; ?>">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="jid" name="jid" value="<?php echo $jid; ?>"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="port" name="port" value="<?php echo $port; ?>"></div>
                                    <span class="help-block"><?php echo $jid_err." ".$port_err; ?></span>
                                </div>
                                <div class="form-group <?php echo (!empty($username_err))? 'has-error' : ''; ?>"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="username" value="<?php echo $username; ?>"></div>
                                <span class="help-block"><?php echo $username_err; ?></span>
                                <div class="form-group row <?php echo (!empty($password_err) || !empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password" value="<?php echo $password; ?>" ></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="confirm_password" ></div>
                                    <span class="help-block"><?php echo $password_err." ".$confirm_password_err; ?></span>
                                </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" value="Register" name="submit">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="assets/js/greencharge.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
