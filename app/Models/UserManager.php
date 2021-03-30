<?php

namespace Project\Models;

use Exception;

class UserManager extends Database{

    public function registerNewUser($username, $email,$password){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?);");
        $req->execute(array($username, $email,$password));
        return $req;
    }

    public function retrievePass($username, $password){
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT * FROM users WHERE username = ?');
        $req->execute(array($username));
        return $req;
    }

    // public function checkUserExists(){
    //     $database = $this->dbConnect();
    //     $req = $database->prepare("SELECT * FROM `users` WHERE username = :username");
    //     if($this->dbConnect->rowCount() > 0){
    //         throw new Exception('Username already taken');
    //     } else{
    //         $this->registerNewUser($username,$email,$password);
    //     }
    // } 

    // I don't know what I'm doing here
}