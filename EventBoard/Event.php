<?php

    require_once "Database.php";
    $id = $_GET['id'];
     function selectetEvent($db, $id){

            $sql = "SELECT * FROM create_event where id = " . $id;
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            $selectedEvent = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $selectedEvent;
    }

    $selectedEvent = selectetEvent(Database::getDb(), $id);
    
    foreach ($selectedEvent as $e){
        $image = $e->keywords;
        $title = $e->event_title;
        $name = $e->organiser_name;
        $date = new DateTime($e->event_date);
        $date1 = date_format($date, 'F d, Y');
        $location = $e->location;
        $hello_id=$e->id;
        $description = $e->description;
    }

    $fnameError = "";
    $lnameError = "";
    $emailError = "";

    function selectuserID($db, $fname, $lname ){

            $sql = "select id from sign_up where fname = '" . $fname . "' and lname = '" . $lname . "'" ;
            $pdostm = $db->prepare($sql);
            $pdostm->setFetchMode(PDO::FETCH_OBJ);
            $pdostm->execute();
            $u_id = $pdostm->fetchAll(PDO::FETCH_OBJ);

            return $u_id;
    }     

    function register($db,  $userId, $eventId, $totalSeats ){

            $sql = "INSERT INTO user_registered (user_id, event_id, seats_booked)
               VALUES (" . $userId . "," . $eventId . ","  . $totalSeats . ");" ;
           echo "$sql";
            $pdostm = $db->prepare($sql);
            $count  = $pdostm->execute();
            return $count;
            
        }

    if(isset($_POST['register'])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $seats = $_POST["seats"];
        $u_id = selectuserID(Database::getDb(),$firstname,$lastname); 
        
        foreach ($u_id AS $id) {
            $userid= $id->id;            
        }

        if($userid>0){
           $count = register(Database::getDb(), $userid, $hello_id, $seats);
            if($count>0){
                header("Location: RegisterThankyou.php");
            }
        }
        else{
            header("Location:Signup.php");
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
         require_once "Header.php";
    ?>
</header>

<div class="container-fluid" id="top">

    <section id="section1" >

        <div id="divimg" class="col-md-8 col-sm-12" >
            <img src="<?php echo $image; ?>"  width='100%' height='400' class="img-rounded">
        </div>
        <div id="divcontent" class="col-md-4 col-sm-12">          
            <div id="innerdiv">
                <section>
                     <b class="font-weight-bold"><?php echo $title; ?></b>
                    <p><?php echo $date1; ?></p>
                </section>
                <section>   
                   <p> Organization Name</p>   
                   <p> <b><?php echo $name; ?> </b></p>             
                   <p> Location</p> 
                   <p> <?php echo $location; ?></p>                  
                </section>      
            </div>      

            <div id="inregister" class="text-center">
               <button type="button" class="btn btn-success btn-lg  hello" data-toggle="modal" data-target="#exampleModal">Register</button>
              
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <form role="form" method="POST" action="">  
                      <div class="modal-body">          
                                    
                            <div class="form-group col-md-12">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name"  autofocus="">
                            <span class="text-danger">
                                <?php
                                 if(isset($fnameError))
                                    echo $fnameError;                       
                                ?>
                            </span>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name"  autofocus="">
                            <span class="text-danger">
                            <?php
                             if(isset($lnameError))
                                echo $lnameError;                       
                            ?>
                        </span>                        
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail"  autofocus="">
                            <span class="text-danger">
                            <?php
                             if(isset($emailError))
                                echo $emailError;                       
                            ?>
                        </span>
                        </div>
                       
                       <div>
                            <label for="seats" >Total Seats</label>
                            <select name="seats">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>                              
                            </select>
                        </div>
                  
                      </div>
                    

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                      </div>
                    </div>
                    </form>
                  </div>
                   
                </div>


            </div>
        </div>
    </section>

    <section id="section2">        
         <b class="font-weight-bold">About This Event</b>
         <p>
             
             <?php echo $description; ?>

         </p>
    </section>
</div>



<footer>
    <?php
        require_once "Footer.php";
    ?>
</footer>

</body>
</html>

