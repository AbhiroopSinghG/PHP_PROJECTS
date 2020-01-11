<?php
require_once 'database.php';

error_reporting( error_reporting() & ~E_NOTICE );

if (isset($_POST['addeve'])) {

    $error=0;
    $titleerror="";
    $iderror="";
    $nameerror="";
    $locationerror="";
    $daterror="";
    $timerrror="";
    $success="";

    if (empty($_POST["title"])) {
        $error=1;
        $titleerror = "Title is required, ";
    }

    if (empty($_POST["uid"])) {
        $error=1;
        $iderror = "User id is required, ";
    }

    if (empty($_POST["oname"])) {
        $error=1;
        $nameerror = "Organizer name is required, ";
    }

    if (empty($_POST["location"])) {
        $error=1;
        $locationerror = "Location is required, ";
    }

    if (empty($_POST["edate"])) {
        $error=1;
        $daterror = "Event date is required, ";
    }

    if (empty($_POST["etime"])) {
        $error=1;
        $timerrror = "Event Time is required";
    }

    if($error==0) {

        $id=$_POST['uid'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $name = $_POST['oname'];
        $location = $_POST['location'];
        $date = $_POST['edate'];
        $time = $_POST['etime'];
        $etype = $_POST['etype'];

        $db = Database::getDb();
        $sql = "INSERT INTO create_event (user_id,event_title,type,organiser_name,location,event_date,event_time,event_type) VALUES  ('$id','$title','$type','$name','$location','$date','$time','$etype')";
        $pst = $db->prepare($sql);

        $count = $pst->execute();

        if($count>0){
            $success="Event successfully inserted";
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
        <h1>Create An Event</h1><span class="error"><?php echo $titleerror." ".$iderror." ".$nameerror." ".$locationerror." ".$daterror." ".$timerrror."".$success?></span>
        <form method="post">
            <label> User Id:</label> <input type="text" name="uid"><br>
            <label> Title: </label> <input type="text" name="title"><br>
            <label> Type: </label>
            <select name="type">
                <option value="seminar">Seminar</option>
                <option value="conference">Conference</option>
                <option value="concert">Concert</option>
                <option value="workshop">Workshop</option>
            </select><br>
            <label> Oraganizer Name: </label> <input type="text" name="oname"><br>
            <label> Location: </label> <input type="text" name="location"><br>
            <label> Date: </label> <input type="date" name="edate"><br>
            <label> Time: </label> <input type="time" name="etime"><br>
            <label> Event Type: </label> <select name="etype">
                <option value="free">Free</option>
                <option value="paid">Paid</option>
            </select>
            <label> </label>
            <input type="submit" name="addeve" value="Add Event">
        </form>
    </div>
</div>
</body>