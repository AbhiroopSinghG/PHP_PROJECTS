<?php


require_once "Database.php";

     function listEvents($db){

            $sql = "SELECT * FROM create_event where published = 1";
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            $create_events = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $create_events;
    }

    $eventsList = listEvents(Database::getDb());

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php

require_once "Header.php";
?>

<div id="data" >
    <div>
        <img src="images/event-manage.jpg" class="mainimage">
    </div>
</div>

<!-- <div class="find text-center">
    <form>
        <label> I Want to go out </label>
        <select>
            <option value="any">Any Date</option>
            <option value="today">Today</option>
            <option value="tomorrow">Tomorrow</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
        </select>

        <label>In</label>
        <select name="provinces" id="provinces">
            <option value="AL">Alberta</option>
            <option value="BC">British Columbia</option>
            <option value="MT">Manitoba</option>
            <option value="NL">Newfoundland and Labrador</option>
            <option value="NB">New Brunswick</option>
            <option value="NS">Nova Scotia</option>
            <option value="ON">Ontario</option>
            <option value="PE">Prince Edward Island</option>
            <option value="OB">Quebec</option>
            <option value="SC">Saskatchewan</option>
        </select>

        <label>Content Type</label>
        <select name="content" id="contentType">
            <option value="Any">Anything</option>
            <option value="Business">Business</option>
            <option value="Science">Science</option>
            <option value="Music">Music</option>
            <option value="Health">Health</option>
            <option value="Community">Community</option>
            <option value="Holiday">Holiday</option>BC
            <option value="Other">Other</option>
        </select>

        <input type="submit" value="Search">
    </form>
</div> -->
<br>

<div class="padding" >
    <div class="data">
        <div class="row flex-row flex-nowrap ">
            
            <?php foreach ($eventsList as $e){

                 $date = new DateTime($e->event_date);
                $date1 = date_format($date, 'F d, Y');

                echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center'>
                <a href='Event.php?id=$e->id'>
                    <img src='$e->keywords' class='img-rounded' width='304' height='236'><br>
                    <span>$date1</span>
                    <b>$e->event_title</b>
                    <i>$e->location</i>
                </a>
            </div>";
            }

            ?>
    </div>
</div>

<footer>
    <?php
        require_once "Footer.php";
    ?>

</footer>
</body>
</html>
