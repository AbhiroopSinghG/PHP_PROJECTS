<?php
require_once "validateUserForm.php";
require_once "Dbhelper.php";
error_reporting( error_reporting() & ~E_NOTICE );
$firstName="";
$lastName="";
$validateEmail="";
$validatePhone="";
$validatePass="";
$validateCnf="";
$fname="";
$lname="";
$email="";
$pno="";
$pass="";
$success="";
if(isset($_POST['adduser'])) {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $email = $_POST['email'];
    $pno = $_POST['phone'];
    $pass = $_POST['password'];
    $cnfPass = $_POST['cnfPass'];


    $user = new validateUserForm();
    $firstName = $user->validateFirstName($fname);
    $lastName = $user->validateLastName($lname);

    $validateEmail = $user->validateEmail($email);
    $validatePhone = $user->validatePhone($pno);
    $validatePass = $user->validatePassword($pass);
    $validateCnf = $user->validateConfirm($pass, $cnfPass);

    if ($firstName == "" && $lastName == "" && $validateEmail == "" && $validatePhone == "" && $validatePass == "" && $validateCnf == "") {
        $insert = new Dbhelper();
        $count = $insert->insert($fname, $lname, $email, $pno, $pass);
        if ($count == 1) {
            $success="User added";
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .col-md-2 {
            background-color: lightblue;
            height: 100vh;
            text-align: center;
            font-size: 3.5vh;
            border-right: grey 1px solid;
        }

        .links {
            color: white;
            text-decoration: none;
            display: block;
            padding: 2vh;
        }

        label {
            display: inline-block;
            float: left;
            clear: left;
            width: 100px;
            text-align: left;
            padding: 1vh;
        }

        input, select {
            display: inline-block;
            float: left;
        }

        h1 {
            padding-bottom: 2vh;
        }
        .error {
            color: red
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-12" style='border-bottom: lightgrey 1px solid;'>
        <a class='navbar-brand' href='#'><img style='max-width:125px; margin-top: -2vh;' src='images/EventBoard.png'
                                              alt=''></a>
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
        <h1>Create A User</h1><span class="error"><?php echo $firstName." ".$lastName." ".$validateEmail." ".$validatePhone." ".$validatePass." ".$validateCnf?></span>
        <form method="post">
            <label> First Name:</label> <input type="text" name="fName"><br>
            <label> Last Name: </label> <input type="text" name="lName"><br>
            <label> Email: </label> <input type="text" name="email"><br>
            <label> Phone: </label> <input type="text" name="phone"><br>
            <label> Password: </label> <input type="password" name="password"><br>
            <label> Confirm Password: </label> <input type="password" name="cnfPass"><br>
            <label> </label>
            <input type="submit" name="adduser" value="Add User">
            <label><span class="error"><?php echo $success ?></span></label>
        </form>
    </div>
</div>
</body>
