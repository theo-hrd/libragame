<?php

namespace Project\Controllers;

class ViewController{

    // redirecting to homepage.php
    function homePage(){
        require 'app/Views/homepage.php';
    }

    // redirecting to login.php
    function loginPage(){
        require 'app/Views/login.php';
    }

    // redirecting to userprofile.php
    function profilePage(){
        require 'app/Views/userprofile.php';
    }


}