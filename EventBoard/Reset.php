<?php
require_once 'Dbhelper.php';
require_once "validateUserForm.php";
error_reporting( error_reporting() & ~E_NOTICE );

$db=new Dbhelper();

$check = $db->checkCode($_GET['email'],$_GET['code']);

if ($check!='') {
    if (isset($_POST['reset'])) {
        $user=new validateUserForm();

        $validatePass= $user->validatePassword($_POST['password']);
        $validateCnf=$user->validateConfirm($_POST['password'],$_POST['cnfpassword']);

        if($validateCnf==''&&$validatePass=='') {

            $db->updatePassword($_GET['email'], $_POST['password']);
            $db->deleteCode($_GET['email'], $_GET['code']);
            header('Location: https://eventboard.000webhostapp.com/resetmessage.php?message=Password Updated successfully');
        }
    }
}
else{
    header('Location: https://eventboard.000webhostapp.com/resetmessage.php?message=404 Page Not found');
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
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"  autofocus="">
        <?php echo "<h6 style='color:red'>".$validatePass."</h6>"; ?>
        <br>
        <label for="inputCnfPassword" class="sr-only">Password</label>
        <input type="password" name="cnfpassword" id="inputCnfPassword" class="form-control" placeholder="Confirm Password"  autofocus="">
        <?php echo "<h6 style='color:red'>".$validateCnf."</h6>"; ?>
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="reset">Reset</button>
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
