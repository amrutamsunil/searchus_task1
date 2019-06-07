
<?php
include ('dbconnect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/*Enable Third-Party Mail Clients
Google may block (by default) third-party (less secure) mail clients like e.g. Outlook, Thunderbird, MailList Controller or Inbox2DB.



See: https://support.google.com/accounts/answer/6010255?hl=en for details.
The page contains a link to enable "Less secure apps" in MyAccount.
You can also enable "Less secure apps" (third-party mail clients) from:
"MyAccount" > "Sign-in & security" > "Connected apps & sites" > "Allow less secure apps"*/
session_start();
$admin_username='searchus222@gmail.com';
$admin_password='Search@us1';
$otp=rand(1000,9999);
$login =$conn->prepare("insert into users (username,password) values (?,?)");
$login->execute([$_POST['email_id'],$_POST['pass']]);
require 'vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = $admin_username;//google account email_id
        $mail->Password = $admin_password;//google account password
        $mail->Port=587;
$mail->setFrom($admin_username, 'OTP');
        $mail->addAddress($_POST['email_id']);
        $mail->isHTML(true);
        $mail->Subject = "SearchUs OTP";
        $mail->Body = "<center><h1>Hi  ".$_POST['name']." </h1></center><br/><h3>Your OTP is : $otp</h3>
            <br/><br/> <a href='#'>Visit Page</a> ";
        if($mail->send()){
            $_SESSION['email']=$_POST['email_id'];
            $_SESSION[$_POST['email_id']]=$otp;
             return true;
        }else{
            return false;
        }

?>
