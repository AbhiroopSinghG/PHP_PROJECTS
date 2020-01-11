<?php

    require_once "Database.php";

    function all_faq($db){

        $sql = "select * from faqs";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $allfaq = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $allfaq;
    }

    $faq = all_faq(Database::getDb());

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
<header>
    <?php
    require_once "Header.php";
    ?>
</header>
<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
    <div class="container">

        <h2>Frequently Asked Questions </h2>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             
           <?php foreach ($faq as $f){  
                echo "<div class='panel panel-default'>";           
                echo "$f->questions";
                echo "$f->answers";         
                echo "</div>";       
            }

            ?>
        </div>
    </div>
</section>
<footer>
    <?php
    require_once "Footer.php";
    ?>
</footer>
</body>
</html>


