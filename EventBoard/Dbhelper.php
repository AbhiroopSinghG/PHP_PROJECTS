<?php
require_once "Database.php";
class  Dbhelper{
    public function insert($fname,$lname,$email,$pno,$pass)
    {
        $db = Database::getDb();
        $sql = "INSERT INTO sign_up(fname,lname,email,password,phoneno) VALUES (:fname, :lname,:email,:pass,:pno)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':fname', $fname);
        $pdostm->bindValue(':lname', $lname);
        $pdostm->bindValue(':email', $email);
        $pdostm->bindValue(':pass', $pass);
        $pdostm->bindValue(':pno', $pno);
        $count = $pdostm->execute();
        return $count;
    }

    public function checkLogin($email,$pass)
    {
        $db = Database::getDb();
        $password="";
        $email1="";
//this method will show all the faqs
        $sql = "SELECT * FROM sign_up where email = '".$email."'";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $zen=$pdostm->fetchAll(PDO::FETCH_OBJ);
        foreach ($zen as $login) {
            $password= $login->password;
        }

        if($pass==$password)
        {
            $a=0;
        }
        else{
            $a=1;
        }
        return $a;
    }

    public function checkUser($email)
    {
        $db = Database::getDb();

        $sql = "SELECT fname FROM sign_up where email = '".$email."'";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $name=$pdostm->fetchAll(PDO::FETCH_OBJ);
        foreach ($name as $login) {
            $userName= $login->fname;
        }
        return $userName;
    }
    public function getUserInformation($email)
    {
        $db = Database::getDb();
        $sql = "SELECT * FROM sign_up where email = '".$email."'";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $name=$pdostm->fetchAll(PDO::FETCH_OBJ);

        return $name;
    }

    public function getUserId($email)
    {
        $db = Database::getDb();

//this method will show all the faqs
        $sql = "SELECT * FROM sign_up where email = '".$email."'";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $name=$pdostm->fetchAll(PDO::FETCH_OBJ);
        foreach ($name as $login) {
            $userName= $login->id;
        }
        return $userName;
    }

    public static function getAllUsers(){
        $db = Database::getDb();

        $sql = "SELECT * FROM sign_up";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $name=$pdostm->fetchAll(PDO::FETCH_OBJ);

        return $name;
    }

    public function insertCode($email,$code){
        $db = Database::getDb();
        $sql = "INSERT INTO code(email,code) VALUES (:email, :code)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':email', $email);
        $pdostm->bindValue(':code', $code);
        $count = $pdostm->execute();
        return $count;
    }

    public function updatePassword($email,$password){
        $db = Database::getDb();
        $sql = "UPDATE sign_up SET password=(:password) where email LIKE '".$email."'";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':password', $password);
        $count = $pdostm->execute();
        return $count;
    }

    public function checkCode($email,$code){
        $db = Database::getDb();
        $sql = "SELECT * FROM code where email like '".$email."' and code =".$code;
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $name=$pdostm->fetchAll(PDO::FETCH_OBJ);
        foreach ($name as $codecheck) {
            $mail= $codecheck->email;
        }
        return $mail;
    }

    public function deleteCode($email,$code){
        $db = Database::getDb();
        $sql = "Delete from code where email like '".$email."' and code =".$code;
        $pdostm = $db->prepare($sql);
        $count = $pdostm->execute();
        return $count;
    }

    public function update($id,$fname,$lname,$email,$pno,$pass)
    {
        $db = Database::getDb();
        $sql = "UPDATE sign_up SET fname=(:fname),lname=(:lname),email=(:email),password=(:pass),phoneno=(:pno) where id=".$id;
        echo $sql;
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':fname', $fname);
        $pdostm->bindParam(':lname', $lname);
        $pdostm->bindParam(':email', $email);
        $pdostm->bindParam(':pass', $pass);
        $pdostm->bindParam(':pno', $pno);
        $count = $pdostm->execute();
        return $count;
    }
    public function deleteUser($email)
    {
        $db = Database::getDb();
        $sql =  "DELETE FROM sign_up WHERE email = '" .$email."';";
        $pdostm = $db->prepare($sql);
        $deleteCount = $pdostm->execute();
        return $deleteCount;
    }

    public function createEvents($getId,$title,$evenType,$desc,$type,$keyword,$oName,$add,$date,$eTime)
    {
        $db = Database::getDb();
        $sql = "INSERT INTO create_event(user_id,event_title,type,description,event_type,keywords,organiser_name,location,event_date,event_time) 
VALUES (:id, :title,:type1,:desc1,:evenType,:keyword,:organiser_name,:location,:event_date,:event_time)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':id', $getId);
        $pdostm->bindValue(':title', $title);
        $pdostm->bindValue(':type1', $evenType);
        $pdostm->bindValue(':desc1', $desc);
        $pdostm->bindValue(':evenType', $type);
        $pdostm->bindValue(':keyword', $keyword);
        $pdostm->bindValue(':organiser_name', $oName);
        $pdostm->bindValue(':location', $add);
        $pdostm->bindValue(':event_date', $date);
        $pdostm->bindValue(':event_time', $eTime);
        $count = $pdostm->execute();
        return $count;
    }

    public function geteventofuser($getUserID){
        $db = Database::getDb();

        $sql= "SELECT * FROM create_event JOIN user_registered ON create_event.id=user_registered.event_id WHERE user_registered.user_id =". $getUserID . ";";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $events=$pdostm->fetchAll(PDO::FETCH_OBJ);

        return $events;
    }
    public function showevents($getuserId)
    {
$db = Database::getDb();

        $sql= "SELECT * FROM create_event where user_id = ". $getuserId . " and published = 1";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        $events=$pdostm->fetchAll(PDO::FETCH_OBJ);

        return $events;
    }
}
?>