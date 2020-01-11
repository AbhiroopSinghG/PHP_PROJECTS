<?php
require_once 'Database.php';

if(isset($_POST['delete'])){
    if(!empty($_POST['check_list'])){
        $db = Database::getDb();
        foreach($_POST['check_list'] as $selected){

            $sql = "DELETE FROM create_event WHERE id='$selected'";
            $pst = $db->prepare($sql);
            $pst->execute();
        }
    }
}

if(isset($_POST['publish'])){
    if(!empty($_POST['publish_list'])){
        $db = Database::getDb();
        foreach($_POST['publish_list'] as $selected){

            $sql = "UPDATE create_event SET published=1 where id='$selected'";
            $pst = $db->prepare($sql);
            $pst->execute();
        }
    }
}

function createEvent()
{
    $db = Database::getDb();
    $sql = "select * from create_event";
    $pdostm = $db->prepare($sql);
    $pdostm->setFetchMode(PDO::FETCH_OBJ);
    $pdostm->execute();

    echo '<form action="#" method="post" id="eventform">';

    foreach ($pdostm as $events) {
        if($events->published==0){
            echo "<tr>";
            echo "<td>".$events->id."</td><td><input type='checkbox' name='check_list[]' value='$events->id'></td><td>".$events->event_title."</td><td>".$events->event_date."</td><td>".$events->event_time."</td><td>Not Published<br><input type='checkbox' name='publish_list[]' value='$events->id'> </td><td><a href='update.php/?uid=".$events->id."'>Modify</a></td>";
            echo "</tr>";
        }
        else{
            echo "<tr>";
            echo "<td>".$events->id."</td><td><input type='checkbox' name='check_list[]' value='$events->id'></td><td>".$events->event_title."</td><td>".$events->event_date."</td><td>".$events->event_time."</td><td>Published</td><td><a href='update.php/?uid=".$events->id."'>Modify</a></td>";
            echo "</tr>";
        }

    }
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
                <h1>Event List</h1><br>
                <table><th>#</th><th><input type="submit" name="delete" value="Delete Selected" form="eventform"/></th><th>Title</th><th>Date</th><th>Time</th><th><input type="submit" name="publish" value="Publish Selected" form="eventform"/></th><th></th>
                    <?php
                    createEvent();
                    ?>
                </table>
            </div>
            </div>
    </div>
    </body>



