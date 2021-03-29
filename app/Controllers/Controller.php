<?php 

namespace Project\Controllers;

use Project\Models\ContactManager;
use Project\Models\UserManager;


class Controller{

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

    function contactSender($username, $email, $message){
        $contactManager = new \Project\Models\ContactManager;

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $contact = $contactManager->sendMessageToDb($username,$email,$message);
            require 'app/Views/success.php';
        } else{
            header('Location: app/Views/error.php');
        }
    }

    function registerNewUser($username, $email, $confirmEmail ,$password, $confirmPassword){
        
        $userManager = new \Project\Models\UserManager;
        $register = $userManager->registerNewUser($username, $email, $confirmEmail ,$password, $confirmPassword);
        require 'app/Views/success.php';
    
    }

}