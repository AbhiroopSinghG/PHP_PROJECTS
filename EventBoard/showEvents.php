<?php

    session_start();

    $getName="";

    if($_SESSION['email']!="")
    {
        $email=$_SESSION['email'];
        require_once "Dbhelper.php";
        //$email= $_SESSION['email'];
        $call = new Dbhelper();
        //$getName = $call->checkUser($email);
        $getDetails = $call->getUserInformation($email);

        foreach ($getDetails as  $value) {
           $getName = $value->fname;
           $getID = $value->id;
        }

         $getEvents = $call->showevents($getID);
    }


?>

<html>
<head>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="userside.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<header>
    <?php
    require_once "HeaderUser.php";
    ?>
</header>
<main>
    <div class="container">
        <div class="row">
            <div id="wrapper">
                <!-- Sidebar -->
                <?php include('userNav.php');?>
                <!-- /#sidebar-wrapper -->
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <script>
                                    $("#menu-toggle").click(function(e) {
                                        e.preventDefault();
                                        $("#wrapper").toggleClass("toggled");
                                    });
                                </script>
 
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
                                <div class="padding" style="padding-left: 40px;" >
                                    <div class="data">
                                        <div class="row flex-row flex-nowrap ">
                                            <table style='width:100%'>
                                              <tr>
                                                <th>EventRegistered</th>
                                                <th>Description</th>                                    
                                              </tr>
                                            <?php foreach ($getEvents as $e){

                                                $date = new DateTime($e->event_date);
                                                $date1 = date_format($date, 'F d, Y');
                                                echo "<tr style='padding-left: 40px;'>
                                                        <td><br><img src='$e->keywords' class='img-rounded' width='300' height='236'><br></td>
                                                        <td
                                                            <p>$e->description</p>
                                                            <br><span>$date1<br>
                                                             <b>$e->event_title</b><br>
                                                             <i>$e->location</i></span>
                                                        </td>
                                                      </tr>";
                                            }

                                            ?>
                                            </table> 
                                    </div>                         
                                </div>
                            </div>
</main>

</body>
</html>