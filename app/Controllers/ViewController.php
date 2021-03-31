<?php

namespace Project\Controllers;

class ViewController{

    function homePage(){
        require 'app/Views/homepage.php';
    }

    function contactPage(){
        require 'app/Views/contact.php';
    }

    function loginPage(){
        require 'app/Views/login.php';
    }

    function registerPage(){
        require 'app/Views/register.php';
    }

    function profilePage(){
        require 'app/Views/userprofile.php';
    }

    

}