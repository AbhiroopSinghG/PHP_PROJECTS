<?php
require_once "Dbhelper.php";
$email= $_SESSION['email'];
$call = new Dbhelper();
$getName = $call->checkUser($email);

?>
<html>
<head>
    <title>
        EventBoard.com
    </title>
</head>
<body>
<nav class='navbar navbar-default' role='navigation'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navbar-collapse-main' >
                <span class='sr-only'>Toogle Navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='#'><img style='max-width:125px; margin-top: -7px;' src='images/EventBoard.png' alt=''></a>
        </div>
        <div class='collapse navbar-collapse' id='navbar-collapse-main'>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='index.php'>Home</a> </li>
                <li><a href='AboutUs.php'>About</a> </li>
                <li><a href='FAQs.php'>FAQs</a> </li>
                <li><a href='ContactUS.php'>Contact Us</a> </li>
                <li><a href='#'>News</a> </li>
                <li><a href='CreateEvent_Page1.php'>Create Event</a> </li>

                <li>

                    <?php

                    echo "<div class='dropdown-show'><a class='btn btn-secondary dropdown-toggle' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Welcome, ".$getName."</a>
<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
    <a class='dropdown-item' href='User.php'>Dashboard</a><br>  </div>
</div>
";

                    ?>
                </li>

            </ul>
        </div>
    </div>
</nav>
</body>
</html>

