<?php

namespace Project\Models;

use Exception;

class UserManager extends Database{

    // requesting to create a new user 
    public function registerNewUser($username, $email,$password){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?);");
        $req->execute(array($username, $email,$password));
        return $req;
    }
    // retrieving the password to check if the password matches the username
    public function userMatching($username){
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT * FROM users WHERE username = ?'); // no other choice than using *
        $req->execute(array($username));
        return $req;
    }

    // checking if the user already exists in database
    public function checkUserExists($username){
        $database = $this->dbConnect();
        $req = $database->prepare("SELECT `username` FROM `users` WHERE username = ?");
        $req->execute([$username]);
        return $req;
    }

    // checking if the email already exists in database
    public function checkEmailExists($email){
        $database = $this->dbConnect();
        $req = $database->prepare("SELECT `email` FROM `users` WHERE email = ?");
        $req->execute(array($email));
        return $req;
    }



}