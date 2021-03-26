<?php

namespace Project\Models;

require('vendor/autoload.php');

use Exception;

class Database{


    protected function dbConnect(){
        
        try{
            $database = new \PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', 'admin');
            return $database;
        } 
        catch(Exception $e){
            die('Error Database: ' . $e->getMessage());
        }

    }
}

