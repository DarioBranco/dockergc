<?php
// Initialize the session
session_start();
include("include/DatabaseManager.php");
$db = new DatabaseManager();

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - GreenCharge Visualization and Evaluation Tool</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="bg-gradient-primary">
  <?php
  // Initialize the session

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: dashboard.php");
      exit;
  }

  $username = $password = "";
  $username_err = $password_err = "";

  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Check if username is empty
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
      } else{
          $username = trim($_POST["username"]);
      }

      // Check if password is empty
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      } else{
          $password = trim($_POST["password"]);
      }

      // Validate credentials
      if(empty($username_err) && empty($password_err)){

              $param_username = $username;
              $logres = $db->loginUser($param_username, $password);
              echo ($logres);
              if( $logres == 0){
                echo "Oops! Something went wrong. Please try again later.";

              }
              else if($logres == 1)
              {                echo "Oops! Something went wrong. Please try again later.";


              }
              else if($logres == 2)
              {
                       echo "Oops! User doesn't exist.";

              }
              else if($logres == 3)
              {

                      $_SESSION["loggedin"] = true;
                      $_SESSION["id2"] = explode('@',$username)[0];
                      $_SESSION["id"] = '"'.explode('@',$username)[0].'"';
					  					  $_SESSION['evaldir'] = 1;

                      // Redirect user to welcome page
                      header("location: index.php");
            }

        }

  }
  ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-repeat: no-repeat;
                                                                                  background-size: 50%;
                                                                                  background-position: center;background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method = 'post'>
                                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="username" value="<?php echo $username; ?>"></div>
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
                                </div>
                            </div>
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
    <script src="assets/js/greencharge.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
