<?php
require_once "Dbhelper.php";

function createUsers(){


    $all=Dbhelper::getAllUsers();

    echo '<form action="#" method="post" id="userform">';

    foreach ($all as $us) {

            echo "<tr>";
            echo "<td><input type='checkbox' name='check_list[]' value='$us->email'></td><td>".$us->fname."</td><td>".$us->lname."</td><td>".$us->email."</td>";
            echo "</tr>";

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
                <table><th><input type="submit" name="delete" value="Delete Selected" form="userform"/></th><th>First Name</th><th>Last Name</th><th>Email</th>
                    <?php
                    createUsers();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>



