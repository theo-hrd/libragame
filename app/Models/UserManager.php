<?php

namespace Project\Models;


class UserManager extends Database{

    public function registerNewUser($username, $email,$password){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?);");
        $req->execute(array($username, $email,$password));
        return $req;
    }


}