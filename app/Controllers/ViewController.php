<?php

namespace Project\Controllers;


// This Controller is used for pages that are not dynamic
class ViewController{

    // redirecting to homepage.php
    function homePage(){
        require 'app/Views/homepage.php';
    }


    // redirecting to updateprofilename.php
    function updateProfileNamePage(){
        require 'app/Views/updateprofilename.php';
    }

    // redirecting to allgames.php
    function allGamesPage(){
        require 'app/Views/allgames.php';
    }


}