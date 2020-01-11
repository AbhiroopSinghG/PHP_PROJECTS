<?php
require_once  'PHPMailer-5.2-stable/PHPMailerAutoload.php';
require_once 'Dbhelper.php';
require_once "validateUserForm.php";
error_reporting( error_reporting() & ~E_NOTICE );
$error='';

if(isset($_POST['reset'])){

        $db = new Dbhelper();
        $exists = $db->checkUser($_POST['email']);

        if ($exists != '') {
            $message = '';
            $mail = new PHPMailer;   //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = 'smtp.gmail.com';    //Set the hostname of the mail server
            $mail->Port = 587;                //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = 'phptestmail1856@gmail.com';
            //Password to use for SMTP authentication
            $mail->Password = 'onetwo12@';
            //Set who the message is to be sent from
            $mail->setFrom('phptestmail1856@gmail.com', 'EventBoard');
            //Set who the message is to be sent to
            $mail->addAddress($_POST['email'], 'John Doe');
            //Set the subject line
            $mail->Subject = 'Password rest link';
            //generating random no of 10 digits
            $numcode = mt_rand(1000000000, 9999999999);

            $db->insertCode($_POST['email'], $numcode);
            //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->Body = "Here is your activation link https://eventboard.000webhostapp.com/Reset.php?email=".$_POST['email']."&code=".$numcode;
            //send the message, check for errors
            if (!$mail->send()) {
                $error = 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $error = 'Check your inbox for an activation link';
            }
        }
        else{
            $error="Email doesn't exist";
        }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<html>

<head>
    <title>
        Login
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
<header>
    <?php
    require_once "Header.php";
    ?>
</header>
<main class="container-fluid text-center">
<br><br><br>
    <form class="form-signin" method="post" action="">
        <img src="images/Logo.png" alt="Logo of Event board" class="img-fluid img-simple">
        <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="">
        <?php echo "<h6 style='color:red'>".$error."</h6>"; ?>
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="reset">Reset Request</button>
    </form>
<br><br><br>
</main>
<footer>
    <?php
    require_once "Footer.php";
    ?>
</footer>
</body>
</html>
