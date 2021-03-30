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
            require 'app/Views/contactsent.php';
        } else{
            header('Location: app/Views/error.php');
        }
        
    
    }

    function registerNewUser($username, $email, $password){
        $userManager = new \Project\Models\UserManager;
        $password = password_hash($password, PASSWORD_DEFAULT);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $register = $userManager->registerNewUser($username, $email, $password);
            require 'app/Views/success.php';
        }else{
            header('Location: app/Views/error.php');
        }
    }

}