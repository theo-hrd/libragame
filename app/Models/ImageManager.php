<?php
namespace Project\Models;

class ImageManager extends Database{

    public function addImage($target_file){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `users`(img) WHERE `img` = ?");
        $req->execute(array($target_file));
        return $req;
    }



}