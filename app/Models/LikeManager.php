<?php
namespace Project\Models;

class LikeManager extends Database{

    // like the game
    function likeGame($gameId, $userId){
        $database = $this->dbConnect();
        $req = $database->prepare("INSERT INTO `likes` (`gameid`,`userid`) VALUE(?,?)");
        $req->execute(array($gameId, $userId));
        return $req;
    }
    // checking if the game is liked or not
    function findLike($gameId, $userId){
        $database = $this->dbConnect();
        $req = $database->prepare("SELECT `gameid`,`userid` FROM `likes` WHERE `gameid`= :gameid AND `userid`= :userid");
        $req->execute(array(
            'gameid' => $gameId,
            'userid' =>$userId
    ));
        return $req;
    }
    // unlike the game
    function dislikeGame($gameId, $userId){
        $database = $this->dbConnect();
        $req = $database->prepare("DELETE FROM `likes` WHERE `gameid`= :gameid AND `userid`= :userid");
        $req->execute(array(
            'gameid' => $gameId,
            'userid' =>$userId
        ));
        return $req;
    }

    function countGame($gameId){
        $database = $this->dbConnect();
        $req = $database->prepare("SELECT count(*) FROM `likes` WHERE `gameid`= :gameid");
        $req->execute(array('gameid' => $gameId));
        return $req;
    }


}