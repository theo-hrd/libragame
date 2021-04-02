<?php

namespace Project\Models;

class ContactManager extends Database{
    
    public static function errors($email, $message) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $errors = array();

        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors["invalid_email"] = "the e-mail is invalid";
        }
        if(empty($email)){
            $errors["required_email"] = "the e-mail is required";
        }
        if(empty($message)){
            $errors["required_message"] =   "the message is required";
        }
        if(strlen($message) > 300){
            $errors["too_long_message"] = 'message is too long ! 300 characters maximum are allowed';
        } 

        return $errors;
    }
    
    
    
    
    
    // sending contact message into database
    public function sendMessageToDb($username,$email,$message){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `contact` (`username`, `email`, `msg`) VALUES (?, ?, ?);");
        $req->execute(array($username,$email,$message));
        return $req;
    }

}


