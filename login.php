
<?php
extract($_POST);
include('dbconnect.php');
if(isset($_POST['login']))
{
    $login =$conn->prepare("select id from users where username=:uname and password=:pass ");
    $login->bindParam('uname',$_POST['email'],PDO::PARAM_STR);
    $login->bindParam('pass',$_POST['password'],PDO::PARAM_STR);
    $login->execute();
    $count=$login->rowCount();
    if($count){
        header('location:dashboard.php');
    }
    else{
        echo "<script>
alert('It seems Your New User, please register !!');
</script>";
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
    <title>Login Form for Searchus</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="main">

    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <form method="POST" id="s" class="signup-form">
                    <h2 class="form-title">Login</h2>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" id="submit" class="form-submit" value="Login"/>
                    </div>
                </form>
                <p class="loginhere">
                    Dont have an account ? <a href="login.php" class="loginhere-link">Register here</a>
                </p>
            </div>
        </div>
    </section>

</div>

    <script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>