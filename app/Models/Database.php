<?php

namespace Project\Models;

require('vendor/autoload.php');

use Exception;

class Database{


    protected function dbConnect(){
        
        try{
            $database = new \PDO($_ENV['DB_ENV']);
            return $database;
        } 
        catch(Exception $e){
            die('Error Database: ' . $e->getMessage());
        }

    }
}

