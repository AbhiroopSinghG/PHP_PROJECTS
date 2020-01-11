<?php

session_start();
require_once "Dbhelper.php";
require_once "validateUserForm.php";
$error="";
$checkEmail="";
$checkPass="";
if(isset($_POST["submit"]))
{

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $valid = new validateUserForm();
    $checkEmail= $valid->validateEmail1($email);
    $checkPass = $valid->validatePassword($pass);
    if($checkEmail=="" && $checkPass=="")
{
    $check = new Dbhelper();
    $a = $check->checkLogin($email,$pass);

    if($email=="admin_abhi@gmail.com" && $pass="admin")
    {
        header("Location:admininterface.php");
    }
    else if($a==0)
    {
        $_SESSION['login'] = TRUE;
        $URL = isset($_SESSION['RedirectKe']) ? $_SESSION['RedirectKe'] : 'User.php';
        header('Location:' . $URL . '');
        $_SESSION['email'] = $email;
    }
    else if($a==1)
    {
        $error="Email or password is doesnot exist";
    }

}


}
else if(isset($_POST["signup"]))
{
    header('Location: SignUp.php');
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

    <form class="form-signin" method="post" action="">
        <img src="images/Logo.png" alt="Logo of Event board" class="img-fluid img-simple">
        <h1 class="h3 mb-3 font-weight-normal">Please Sign-in</h1>
        <br><label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="" name="email">
        <?php  echo "<h6 style='color:red'>".$checkEmail."</h6>";?>
        <br><label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" autofocus="" name="pass">
        <?php  echo "<h6 style='color:red'>".$checkPass."</h6>";?>
        <?php  echo "<h6 style='color:red'>".$error."</h6>";?>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="lsRememberMe" id="rememberMe" > Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <h1 class="h5 mb-3 font-weight-normal"><a href="Forgot.php">Forgot Password?</a> </h1>
        <h1 class="h3 mb-3 font-weight-normal">Don't have an account?</h1>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Sign Up</button>
    </form>

</main>
<footer>
    <?php
    require_once "Footer.php";
    ?>
</footer>



<script>
    let rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

    if (localStorage.checkbox && localStorage.checkbox != "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
    }

    function lsRememberMe() {
        if (rmCheck.checked && emailInput.value != "") {
            localStorage.username = emailInput.value;
            localStorage.checkbox = rmCheck.value;
        } else {
            localStorage.username = "";
            localStorage.checkbox = "";
        }

</script>

</body>
</html>
