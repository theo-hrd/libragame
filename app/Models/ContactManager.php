<?php

namespace Project\Models;

class ContactManager extends Database{
    // sending contact message into database
    public function sendMessageToDb($username,$email,$message){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `contact` (`username`, `email`, `msg`) VALUES (?, ?, ?);");
        $req->execute(array($username,$email,$message));
        return $req;
    }

}


