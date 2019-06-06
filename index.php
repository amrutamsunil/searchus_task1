<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form of Searchus</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        #status{
            display: none;
        }
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="s" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <p id="status" >Your Mail is on the way ...!!</p>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>

                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type='text/javascript'>
        $('#s').on('submit',function (e) {
            e.preventDefault();
            var name=$(this).find("input[name='name']").val();
            var email=$(this).find("input[name='email']").val();
            var pass=$(this).find("input[name='password']").val();
            $.ajax(
                {
                    type:'post',
                    url:'email_generator.php',
                    data:{name:name,email_id:email,pass:pass},
                    beforeSend:function(){
                        $('#status').show();
                    },
                    success:function(response){
                        $('#status').hide();
                        if(response){
                       alert('OTP has been sent to your email');
                        window.location.replace('otp.php');
                        }
                    }

                }
            );

        });

    </script>

</body>
</html>