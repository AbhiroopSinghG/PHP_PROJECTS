<?php

	require_once "Database.php";
	require_once "Contact.php";

	$db= Database::getDb();
	$contact = new Contact();

	if(isset($_POST['oldUpdate'])) {

	    $id = $_POST['id'];
	    $c_id = $contact->getContactDetails($db, $id);
	    $province = $c_id->province;
	    $description = $c_id->reason;

	}

	if(isset($_POST['update'])){

		$contacts = new Contact();
	    $id = $_POST['cid'];
	    $fname = $_POST['firstname'] ;
		$lname = $_POST['lastname'] ;
	    $email = $_POST['email'];
	    $contact = $_POST['contact'] ;
	    $subject = $_POST['subject'];
	    $province = $_POST['provinces'];

	    $count = $contacts->updateContact($db, $id, $fname, $lname ,$email, $contact, $province,  $subject);
	    if($count){
	        header("Location: ContactUs.php");
	    }else {
	        echo "problem updating";
	    }
	}

?>

<link rel="stylesheet" type="text/css" href="css/Style.css">

<div id="alldata">

	<img src="img/Contact-us.png" style="height:200px; width:900px;">
	<div id="inform">
		<form action="updateContact.php"  method="post"><br>

		<label for="fname">Id: </label>
		<input type="text" value="<?= $c_id->id; ?>" name="cid" readonly><br><br>

	    <label for="fname">Name: </label>
	    <input type="text" id="fname" name="firstname" value="<?= $c_id->fname; ?>">
	    <input type="text" id="lname" name="lastname" value="<?= $c_id->lname; ?>"><br><br>

	    <label for="email">Email Id: </label>
	    <input type="text" id="email" name="email" value="<?= $c_id->email; ?>"><br><br>

	    <label for="contact_no">Contact Number: </label>
	    <input type="text" id="contact" name="contact" value="<?= $c_id->contact_no; ?>"><br><br>

	    <label for="province" id="province">Province : </label>
			<select name="provinces" id="provinces">
				<option value="NULL" >Please Select Province</option>
				<option value="AL" <?php if($province == 'BC'){ echo ' selected="selected"'; } ?> >Alberta</option>
				<option value="BC" <?php if($province == 'BC'){ echo ' selected="selected"'; } ?> >British Columbia</option>
				<option value="MT" <?php if($province == 'MT'){ echo ' selected="selected"'; } ?>>Manitoba</option>
				<option value="NL" <?php if($province == 'NL'){ echo ' selected="selected"'; } ?>>Newfoundland and Labrador</option>
				<option value="NB" <?php if($province == 'NB'){ echo ' selected="selected"'; } ?>>New Brunswick</option>
				<option value="NS" <?php if($province == 'NS'){ echo ' selected="selected"'; } ?>>Nova Scotia</option>
				<option value="ON" <?php if($province == 'ON'){ echo ' selected="selected"'; } ?>>Ontario</option>
				<option value="PE" <?php if($province == 'PE'){ echo ' selected="selected"'; } ?>>Prince Edward Island</option>				
				<option value="OB" <?php if($province == 'QB'){ echo ' selected="selected"'; } ?>>Quebec</option>				
				<option value="SC" <?php if($province == 'SC'){ echo ' selected="selected"'; } ?>>Saskatchewan</option>
			</select><br><br>

	    <label for="subject"> Subject: </label><br><br>
	    <textarea id="subject" name="subject" style="height:200px; width:500px;"><?php echo $description; ?></textarea><br><br>

	    <input type="submit" value="Update Contact" name="update">

	  </form>
	</div>
 </div>