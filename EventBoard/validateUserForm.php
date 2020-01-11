<?php
require_once "Database.php";

class validateUserForm{

    public function validateFirstName($fname)
    {

        //$nullError = "Please Enter Your First Name";
        // $inputError = "";
        if ($fname == "")
        {
            $inputError = "Please Enter Your First Name";
        }
        else if(!preg_match("/^[a-zA-Z -]*$/",$fname))
        {
            $inputError = "Please Enter your First Name in correct format"  ;
        }
        else
        {
            $inputError = "";
            // return $fname;
        }
        return $inputError;
    }
    public function validateLastName($lname)
    {
        $namePattern = "/[A-Za-z]*$/";

        if ($lname == "") {
            $inputError = "Please Enter your Last Name ";
        }
        else if(!preg_match("/^[a-zA-Z -]*$/",$lname))
        {
            $inputError = "Please Enter your Last Name in correct format";
        }
        else{
            $inputError="";
        }
        return $inputError;
    }
    public function validateEmail($email)
    {

        $db = Database::getDb();
        $sql = "SELECT email FROM sign_up where email=?";
        $pdostm = $db->prepare($sql);
        $pdostm->execute([$email]);
        $check = $pdostm->rowCount();

        if(empty($email))
        {
            $inputError = "Please Enter Email";
        }
        else if($check>=1)
        {

            $inputError = "Email already taken";
        }

        else if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
        {
            $inputError = "Please Enter Email in xxx@y.com";
        }

        else
        {
            $inputError="";
        }
        return $inputError;
    }

    public function validateEmail1($email)
    {


        if(empty($email))
        {
            $inputError = "Please Enter Email";
        }

        else if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
        {
            $inputError = "Please Enter Email in xxx@y.com";
        }

        else
        {
            $inputError="";
        }
        return $inputError;
    }



    public function validatePhone ($phoneno)



    {
        if(empty($phoneno))
        {
            $inputError="Please Enter Phone Number";
        }
        else if(!preg_match("/^[+]?[1-9][0-9]{0,9}/",$phoneno))
        {
            $inputError = "Please Enter in Correct Format";
        }
        else
        {
            $inputError="";
        }
        return $inputError;
    }
    public function validatePassword($pass)
    {
        $pattern = "/[a-zA-Z0-9]{4,9}/";

        if ($pass == "") {
            $inputError="Please Enter Password";;
        }
        else if (!preg_match($pattern, $pass)) {
            $inputError= "PLease Enter Password in cirrect Format";
        }
        else
        {
            $inputError="";
        }
        return $inputError;
    }
    public function validateConfirm($pass,$cnf)
    {

        if($cnf== "")
        {
            $inputError = "Please Enter Password";
        }

        else if($pass!=$cnf)
        {
            $inputError ="Password Doesn't matches, please insert password as above field";
        }
        else
        {
            $inputError="";
        }
        return $inputError;
    }
}
?>