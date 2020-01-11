<?php
	
	class Contact{

		public function addContact($db, $fname , $lname, $email, $contact, $province ,$subject){

	        $sql = "INSERT INTO contact_us (fname, lname, email, contact_no, province, reason)
	            VALUES (:fname , :lname , :email, :contact, :province ,:reason)";
	        $pdostm = $db->prepare($sql);
	        $pdostm->bindValue(':fname', $fname, PDO::PARAM_STR);
	        $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);
	        $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
	        $pdostm->bindValue(':contact', $contact, PDO::PARAM_STR);
	        $pdostm->bindValue(':province', $province, PDO::PARAM_STR);
	        $pdostm->bindValue(':reason', $subject, PDO::PARAM_STR);
	        $count  = $pdostm->execute();
	        return $count;

	    }

	    public function listContacts($db){
	        $sql = "SELECT * FROM contact_us";
	        $pdostm = $db->prepare($sql);
	        $pdostm->setFetchMode(PDO::FETCH_OBJ);
	        $pdostm->execute();
	        $contact_details = $pdostm->fetchAll(PDO::FETCH_OBJ);
	        return $contact_details;
	    }
	    
	    public function getContactDetails($db, $id){

	        $query = "SELECT * FROM contact_us WHERE id= :id";
	        $pdostm = $db->prepare($query);
	        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
	        $pdostm->execute();
	        $c = $pdostm->fetch(PDO::FETCH_OBJ);
	        return $c;

	    }

	   public function updateContact($db, $id, $fname , $lname, $email, $contact, $province ,$subject){
	        $sql = "UPDATE contact_us 
	                SET fname = :fname,
	                lname = :lname,
	                email = :email,
	                contact_no = :contact,
	                province = :province,
	                reason = :reason
	                WHERE id = :id";
	        $pdostm = $db->prepare($sql);
	        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
	        $pdostm->bindValue(':fname', $fname, PDO::PARAM_STR);
		    $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);
		    $pdostm->bindValue(':email', $email, PDO::PARAM_STR);
		    $pdostm->bindValue(':contact', $contact, PDO::PARAM_STR);
		    $pdostm->bindValue(':province', $province, PDO::PARAM_STR);
		    $pdostm->bindValue(':reason', $subject, PDO::PARAM_STR);
	        $count  = $pdostm->execute();
	        return $count;
	    }

	     public function deleteContact($db, $id){
	        $query = "DELETE FROM contact_us WHERE id = :id";
	        $pdostm = $db->prepare($query);
	        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
	        $count = $pdostm->execute();
	        return $count;

	    }

	}

?>