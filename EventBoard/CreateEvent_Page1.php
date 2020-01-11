<?php
session_start();
require_once "validateEvents.php";
$titleValidate=$typeValidate=$keywordValidate=$organizerName="";
if(!isset($_SESSION['login']))
{
    $_SESSION['RedirectKe']=$_SESSION['REQUEST_URI'];
    header("Location:Login.php");
}
else if(isset($_POST['action2']))
{
    $title=$_POST['eventitle'];
    $type=$_POST['select'];
    $keyword = $_POST['keyword'];
    $oName = $_POST['organizer'];
    $valid = new validateEvents();
    $titleValidate = $valid->title($title);
    $typeValidate = $valid->type($type);
    $keywordValidate = $valid->keyword($keyword);
    $organizerName = $valid -> organizer($oName);
    if($titleValidate=="" && $typeValidate=="" && $keywordValidate=="" && $organizerName=="")
    {
        header("Location:CreateEvent_Page2.php?title=$title&type=$type&keyword=$keyword&organiser=$oName");
    }
}

?>
<html>
<head>
    <title>
        Event
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
     if($_SESSION['email']!="")
     {
         require_once "HeaderUser.php";
     }
     else
     {
    require_once "Header.php";
     }
    ?>
</header>
<main class="container-fluid text-center">

    <p class="h1 mb-3 text-center page-header"><strong>Create Event</strong></p>
    <form class="form-signin page-content" action="" method="post">
        <!--            <img src="images/Logo.png" alt="Logo of Event board" class="img-fluid img-simple">-->
        <fieldset>
            <legend>
                <h1 class="h1 mb-3 font-weight-normal"><i class="fa fa-info" style="font-size:36px;color:black;"></i>Basic Info</h1>
            </legend>
        </fieldset>

        <div class="form-row" name="row-1">
            <div class="form-group col-md-15">
                <label for="inputTitle" class="h4 form-control-label">Event Title</label>
            </div>
            <div class="form-group col-md-15">
                <input type="text" id="inputTitle" class="form-control" placeholder="Please Enter Your Title of Event here"  autofocus="" name="eventitle">
                <?php  echo "<h6 style='color:red'>".$titleValidate."</h6>";?>
            </div>
        </div>
        <div class="form-row" name="row-2">
            <div class="form-group col-md-15">
                <label for="inputType" class="h4 form-control-label">Event Type</label>
            </div>
            <div class="form-group col-md-15">
                <select class="form-control"  autofocus="" name="select">
                    <option></option>
                    <option value="Appearance or Signing" >Appearance or Signing</option>
                    <option value="Appearance or Signing" >Attraction</option>
                    <option value="Appearance or Signing" >Camp, Trip, or Retreat</option>
                </select>
                <?php  echo "<h6 style='color:red'>".$typeValidate."</h6>";?>
            </div>
        </div>
<!--        <div class="form-row" name="row-3">-->
<!--            <div class="form-group col-md-15">-->
<!--                <label for="inputCategory" class="h4 form-control-label">Event Category</label>-->
<!--            </div>-->
<!--            <div class="form-group col-md-15">-->
<!--                <select class="form-control" name="inputCategory" autofocus="">-->
<!--                    <option>Category</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
        <div class="form-row" name="row-4">
            <div class="form-group col-md-15">
                <label for="inputKeywords" class="h4 form-control-label">Event Keywords</label>
            </div>
            <div class="form-group col-md-15">
                <input type="text" id="inputKeywords" class="form-control" placeholder="Enter tags"  autofocus="" name="keyword">
                <?php  echo "<h6 style='color:red'>".$keywordValidate."</h6>";?>
            </div>
        </div>
        <fieldset>
            <legend>
                <h1 class="h1 mb-3 font-weight-normal"><i class="fa fa-female" style="font-size:36px;color:black;">
                        <i class="fa fa-male" style="font-size:36px;color:black;"></i></i>Organizer</h1>
            </legend>
        </fieldset>
        <div class="form-row" name="row-5">
            <div class="form-group col-md-15">
                <label for="inputOrganiserName" class="h4 form-control-label">Organiser Name</label>

                <input type="text" id="inputOrganiserName" class="form-control" placeholder="Name of Event Organiser"  autofocus="" name="organizer">
                <?php  echo "<h6 style='color:red'>".$organizerName."</h6>";?>
            </div>
            <!--            </div>-->
            <!--            <div class="form-row" name="row-6">-->
            <!--                <div class="form-group col-md-15">-->
            <!--                    <label for="inputOrganiserEmail" class="h4 form-control-label">Organiser Contact Email</label>-->
            <!--                    <input type="text" id="inputOrganiserEmail" class="form-control" placeholder="Contact Email of Event Organiser"  autofocus="">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="form-row" name="row-7">-->
            <!--                <div class="form-group col-md-15">-->
            <!--                    <label for="inputOrganiserNumber" class="h4 form-control-label">Organiser Contact Number</label>-->
            <!--                    <input type="text" id="inputOrganiserNumber" class="form-control" placeholder="Contact Number of Event Organiser"  autofocus="">-->
            <!--                </div>-->
            <!--            </div>-->


            <!--            <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Register</button>-->
    </form>
    <nav>
        <ul class="pagination">

            <button class="page-item active" type="submit" name="action1"><a class ="page-link" href="CreateEvent_Page1.php">1</a></button>
            <button class="page-item active" type="submit" name="action2">2</button>
            <!--            <li class="page-item"><a class ="page-link" href="CreateEvent_Page1.php">></a></li>-->
        </ul>
    </nav>
</main>

</main>
<footer>
    <?php
    require_once "Footer.php";
    ?>
</footer>
</body>
</html>
