<?php

$id=$_GET['uid'];
require_once 'database.php';
error_reporting(E_ALL & ~E_NOTICE);

if(!isset($_POST['updstu'])) {
    $db = Database::getDb();
    $sql = "select * from create_event where id=" . $id;
    $pdostm = $db->prepare($sql);
    $pdostm->setFetchMode(PDO::FETCH_OBJ);
    $pdostm->execute();
    foreach ($pdostm as $events) {
        $user_id=$events->user_id;
        $title = $events->event_title;
        $type = $events->type;
        $name = $events->organiser_name;
        $location = $events->location;
        $date = $events->event_date;
        $time = $events->event_time;
        $etype = $events->event_type;
    }
}

if(isset($_POST['updstu'])){
    $title = $_POST['title'];
    $type = $_POST['type'];
    $name = $_POST['oname'];
    $location = $_POST['location'];
    $date = $_POST['edate'];
    $time = $_POST['etime'];
    $etype=$_POST['etype'];

    $db = Database::getDb();
    $sql = "UPDATE create_event SET event_title = '".$title."', type='".$type."',organiser_name='".$name."', location='".$location."', event_date='".$date."', event_time='".$time."', event_type='".$etype."' WHERE id='".$id."';";
    $pst = $db->prepare($sql);

    $count = $pst->execute();

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .col-md-2{
            background-color: lightblue;
            height: 100vh;
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
        label{
            display: inline-block;
            float: left;
            clear: left;
            width: 100px;
            text-align: left;
            padding: 1vh;
        }
        input,select {
            display: inline-block;
            float: left;
        }
        h1{
            padding-bottom: 2vh;
        }
    </style>
</head>
<body>
<div class="row">
        <div class="col-md-12" style='border-bottom: lightgrey 1px solid;'>
            <a class='navbar-brand' href='#'><img style='max-width:125px; margin-top: -2vh;' src='http://localhost/EventBoard/images/EventBoard.png' alt=''></a>
        </div>
</div>
<div class="row">
    <div class="col-md-2">

            <a href="http://localhost/EventBoard/create.php" class="links">CREATE EVENT</a>
            <a href="http://localhost/EventBoard/admininterface.php" class="links">ADMIN PANEL</a>

    </div>
    <div class="col-md-8">
        <h1>Update Event</h1>
        <form method="post">
            <label>User Id:</label> <input type="text" name="uid" value="<?php echo "$user_id" ?>" readonly><br>
            <label>Title:</label> <input type="text" name="title" value="<?php echo "$title"?>"><br>
            <label>Type:</label>
            <select name="type">
                <option value="seminar" <?php if($type=="Seminar") echo 'selected' ?>>Seminar</option>
                <option value="conference" <?php if($type=="Conference") echo 'selected' ?>>Conference</option>
                <option value="concert" <?php if($type=="Concert") echo 'selected' ?>>Concert</option>
                <option value="workshop" <?php if($type=="Workshop") echo 'selected' ?>>Workshop</option>
            </select><br>
            <label>Oraganizer Name:</label> <input type="text" name="oname" value="<?php echo "$name"?>"><br>
            <label>Location:</label> <input type="text" name="location" value="<?php echo "$location"?>"><br>
            <label>Date:</label> <input type="date" name="edate" value="<?php echo "$date"?>"><br>
            <label>Time:</label> <input type="time" name="etime" value="<?php echo "$time"?>"><br>
            <label>Event Type:</label> <select name="etype">
                <option value="free" <?php if($etype=="free") echo 'selected' ?>>Free</option>
                <option value="paid" <?php if($etype=="paid") echo 'selected' ?>>Paid</option>
            </select>
            <br>
            <label></label>
            <input type="submit" name="updstu" value="Update Event">
        </form>
    </div>
</div>
</body>
