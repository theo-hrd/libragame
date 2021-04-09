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

    // checking if the user already exists in database
    public function checkUserExists($username){
        $database = $this->dbConnect();
        $req = $database->prepare("SELECT `username`,`password`,`id` FROM `users` WHERE username = ?");
        $req->execute(array($username));
        return $req;
    }

    // checking if the password is matching the username for the connection form
    public function userPassword($username){
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT `password` FROM `users` WHERE `username` = ?'); // no other choice than using *
        $req->execute(array($username));
        return $req;
    }

    // checking if the email already exists in database
    public function checkEmailExists($email){
        $database = $this->dbConnect();
        $req = $database->prepare("SELECT `email` FROM `users` WHERE email = ?");
        $req->execute(array($email));
        return $req;
    }


    // updating the username
    public function changeUsername($id, $username){
        $database = $this->dbConnect();
        $req = $database->prepare("UPDATE `users` SET `username`= :username WHERE `users`.`id` = :id");
        $req->execute([
            'username' => $username,
            'id' => $id
            ]);
        return $req;
    }

    // deleting the user
    public function deleteUser($id){
        $database = $this->dbConnect();
        $req = $database->prepare("DELETE FROM `users` WHERE id = ?");
        $req->execute(array($id));
        return $req;
    }
}