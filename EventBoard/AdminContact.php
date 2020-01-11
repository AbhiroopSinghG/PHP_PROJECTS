<?php
require_once 'Database.php';
require_once 'Contact.php';
require_once  'PHPMailer-5.2-stable/PHPMailerAutoload.php';


if(isset($_POST['SndEmail'])){
    $message='';
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
    $mail->addAddress($_POST['SndEmail'], 'John Doe');
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    $mail->Body=htmlspecialchars($_POST['txtReply']);;
    //send the message, check for errors
    if (!$mail->send()) {
        $message= 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        $message='Message Sent!';
    }

}

function createContacts()
{
    $db = Database::getDb();
    $contacts=Contact::listContacts($db);

    echo '<form action="#" method="post">';

    echo '<table width="100%"><tr><th>Name</th><th>Query</th><th>Reply</th><th></th></tr>';
    foreach ($contacts as $con) {
        echo "<tr><td>".$con->fname."</td><td>".$con->reason."</td><td><textarea name='txtReply' rows='3' cols='30'></textarea></td><td><button type='submit' name='SndEmail' value=$con->email>Reply</button></td></tr>";

    }
    echo '</table>';
    echo '</form>';

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <style>
        .col-md-2 {
            background-color: lightblue;
            height: auto;
            text-align: center;
            font-size: 3.5vh;
            border-right: grey 1px solid;
        }

        .links{
            color: white;
            text-decoration: none;
            display: block;
            padding: 2vh;
        }
        table{
            background-color: lightgrey;
            border: grey 1px solid;
        }
        th,td{
            text-align: center;
            padding-right: 12vh;
            padding-bottom: 5vh;
            border-bottom: grey 1px solid;
        }
        h4{
            color: red;
        }
    </style>
</head>

<body>
<div class="row">
    <div class="col-md-12" style='border-bottom: lightgrey 1px solid;'>
        <a class='navbar-brand' href='#'><img style='max-width:125px; margin-top: -2vh;' src='images/EventBoard.png' alt=''></a>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <a href="create.php" class="links">CREATE EVENT</a>
        <a href="admininterface.php" class="links">ADMIN PANEL</a>
        <a href="AdminContact.php" class="links">CONTACTS</a>
        <a href="CreateUserAdmin.php" class="links">ADD USER</a>
        <a href="UserAdmin.php" class="links">ADMIN USERS</a>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact List</h1><br>
                <?php
                if (!empty($message)) echo "<h4>".$message."</h4>";
                createContacts();
                ?>

            </div>
        </div>
    </div>
</body>
