<?php
session_start();
if(isset($_POST['submit'])){
    $email=$_SESSION['email'];
    if($_SESSION[$email]==$_POST['otp']){
        session_destroy();
        header('location:dashboard.php');

    }else{
        session_destroy();
        echo "<script>alert('Invalid otp !!');</script>";
        header('location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">

    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <form method="POST" id="s" class="signup-form">
                    <h2 class="form-title">OTP</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="otp"  placeholder="Enter your otp"/>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                    </div>
                    <div id="timer"></div>
                </form>
            </div>
        </div>
    </section>
</div>
    <script type="text/javascript">
                  var total_seconds = 60 * 5;

          var c_minutes = parseInt(total_seconds / 60);

          var c_seconds = parseInt(total_seconds % 60);


          checkTime();


          function checkTime() {

              document.getElementById('timer').innerHTML = 'Time Left  :   ' + c_minutes + 'min  ' + c_seconds + 'sec';

              if (total_seconds <= 0) {
                  alert('session failed');
                  window.location.replace('index.php');

              } else {

                  total_seconds = total_seconds - 1;

                  c_minutes = parseInt(total_seconds / 60);

                  c_seconds = parseInt(total_seconds % 60);

                  setTimeout("checkTime()", 1000);

              }

          }
</script>
<script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>