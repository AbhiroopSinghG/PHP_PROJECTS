<?php

    require_once "Database.php";
    require_once "Contact.php";

    $province="";
    $set = 0;

    $fnameError = "";
    $lnameError = "";
    $emailError = "";
    $contactError="";
    $provinceError = "";

    if(isset($_POST['firstname'])){
        $firstname = $_POST['firstname'];
        $pattern = "/[a-zA-Z]{1,10}/";
        if($firstname==""){
            $fnameError = "Enter First Name";
        }
        elseif(!preg_match($pattern, $firstname)){
            $fnameError = "Invalid Name";
        }
        else{
            $fnameError = "";
            $set++;            
        }    
    }

    if(isset($_POST['lastname'])){
        $lastname = $_POST['lastname'];
        $pattern = "/[a-zA-Z]{1,10}/";
        if($lastname==""){
            $lnameError = " Enter Last Name";
        }
        elseif(!preg_match($pattern, $lastname)){
            $lnameError = "Invalid Name";
        }
        else{
            $lnameError = "";
            $set++;            
        }
    }

    if(isset($_POST['email']))
     {
      $email = $_POST['email'];
      
      if($email == "")
        {
            $emailError = "Enter Email";
        }
      elseif(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
        {
             $emailError = "Enter email in valid format";
        }
        else{
            $emailError = "";
            $set++;
            $email = $_POST['email'];
        }
    } 

    if(isset(($_POST['contact']))){
        $phone = $_POST['contact'];
        $pattern="/[0-9]{10}+$/";
        if($phone == ""){
            $contactError = "Enter Contact Number";
        }
        elseif(!preg_match(($pattern), $phone)){
            $contactError = "Enter valid Contact";
        }
        else{
            $contactError="";
            $set++;
        }
    }

    if(isset($_POST['provinces'])){

     $province = $_POST['provinces'];
     if($province == "Please Select Province" ){
            $provinceError = "Select Your Province";
        }
        else{
            $provinceError = "";
            $set++;
        }
    }

    if(isset($_POST['register']) && $set == 5){

        $fname = $_POST['firstname'] ;
        $lname = $_POST['lastname'] ;
        $email = $_POST['email'];
        $contact = $_POST['contact'] ;
        $postalcode = $_POST['provinces'];
        $subject = $_POST['subject'];

        $c = new Contact();
        $count = $c->addContact(Database::getDb(), $firstname , $lastname, $email, $contact, $province , $subject);
      
        if($count){
            header("Location: ContactThankyou.php");
        }
        else{
           // header("Location: ContactUS.php");
        }
    }   
    
?>
<html>
<head>
    <title>
        Contact US
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
    <!--    used php call to insert header -->
    <?php
    require_once "Header.php";
    ?>
</header>
<main class="container-fluid text-center">
    <!--    Container class is used for Responsive and text-center is used for center alignment in center -->
    <!--this is the main body page of sign up -->
    <form class="form-signin" action="ContactUS.php" method="POST">

        <img src="images/Logo.png" alt="Logo of Event board" class=" img-simple">
        <!--        Logo Print to the page-->
        <h1 class="h3 mb-3 font-weight-normal">Contact Us</h1>
        <!--        Building Forms in the format of Table Using Bootstrap Classes-->
        <div class="form-row" name="row-1">
            <div class="form-group col-md-6">
                <label for="inputFirstName" class="sr-only">First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="First Name"  autofocus="">
                <span class="text-danger">
                    <?php
                     if(isset($fnameError))
                        echo $fnameError;                       
                    ?>
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName" class="sr-only">Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Last Name"  autofocus="">
                <span class="text-danger">
                <?php
                 if(isset($lnameError))
                    echo $lnameError;                       
                ?>
            </span>
            </div>
        </div>
        <div class="form-row" name="row-2">
            <div class="form-group col-md-12">
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail"  autofocus="">
                <span class="text-danger">
                <?php
                 if(isset($emailError))
                    echo $emailError;                       
                ?>
            </span>
            </div>
        </div>

        <div class="form-row" name="row-4">
            <div class="form-group col-md-12">
                <label for="inputPhone" class="sr-only">Phone Number</label>
                <input type="text" name="contact" class="form-control" placeholder="Phone Number"  autofocus="">
                <span class="text-danger">
                <?php
                 if(isset($contactError))
                    echo $contactError;                         
                ?>
            </span>
            </div>
        </div>
        <div class="form-row" name="row-5">
            <div class="form-group col-md-12">
                <label for="inputProvince" class="sr-only">Province</label>
                <select name="provinces" name="provinces" class="form-control" autofocus="">
                <option value="NULL" >Please Select Province</option>
                <option value="AL"  >Alberta</option>
                <option value="BC" <?php if($province == 'BC'){ echo ' selected="selected"'; } ?> >British Columbia</option>
                <option value="MT" <?php if($province == 'MT'){ echo ' selected="selected"'; } ?>>Manitoba</option>
                <option value="NL" <?php if($province == 'NL'){ echo ' selected="selected"'; } ?>>Newfoundland and Labrador</option>
                <option value="NB" <?php if($province == 'NB'){ echo ' selected="selected"'; } ?>>New Brunswick</option>
                <option value="NS" <?php if($province == 'NS'){ echo ' selected="selected"'; } ?>>Nova Scotia</option>
                <option value="ON" <?php if($province == 'ON'){ echo ' selected="selected"'; } ?>>Ontario</option>
                <option value="PE" <?php if($province == 'PE'){ echo ' selected="selected"'; } ?>>Prince Edward Island</option>             
                <option value="OB" <?php if($province == 'QB'){ echo ' selected="selected"'; } ?>>Quebec</option>               
                <option value="SC" <?php if($province == 'SC'){ echo ' selected="selected"'; } ?>>Saskatchewan</option>
             </select>
              <span class="text-danger">
                    <?php
                     if(isset($provinceError))
                        echo $provinceError;                       
                    ?>
                </span>
            </div>
        </div>
            <div class="form-group col-md-12">
                <label for="inputComments" class="sr-only">Reason for contacting</label>
                <textarea name="subject" class="form-control" placeholder="Describe your problem.....!!"  autofocus="" style="height: 150px;"></textarea>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" >Register</button>
    </form>
</main>
<footer>
    <?php
    require_once "Footer.php";
    ?>
</footer>

</body>
</html>

