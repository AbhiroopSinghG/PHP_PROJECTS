<?php
	
	require_once "Database.php";
	require_once "Contact.php";

	$db= Database::getDb();
	$contact = new Contact();

	$id = $_POST['id'];

	$count = $contact->deleteContact($db, $id);

	if($count){
	    header("Location: ContactUs.php");
	}else {
	    echo "Problem deleting";
	}


?>