<?php
session_start();
require_once "Dbhelper.php";
$email =$_SESSION['email'];
echo $email;
if($email!="")
{
    $call = new Dbhelper();
    $count = $call->deleteUser($email);
    if($count>=1)
    {
        session_destroy();
        header("Location:index.php");
    }
}
?>

