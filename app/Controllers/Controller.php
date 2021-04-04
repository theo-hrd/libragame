<?php 

namespace Project\Controllers;

use Project\Models\ContactManager;
use Project\Models\UserManager;
use Project\Models\ErrorManager;

class Controller{

    // redirecting to allgames.php
    function allGamesPage(){
        require 'app/Views/allgames.php';
    }



    // CONTACT
    // redirecting to contact.php
    function contactPage($errors=array()){
        require 'app/Views/contact.php';
    }

    function contactSender($username, $email, $message){
        
        $contactManager = new \Project\Models\ContactManager;
        // removing all illegals characters in email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // declaring an empty array to $errors 
        $errors = array();

        // error handling
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors["invalid_email"] = "the e-mail is invalid"; 
        }
        if(empty($email)){
            $errors["required_email"] = "the e-mail is required";
        }
        if(empty($message)){
            $errors["required_message"] =   "the message is required";
        }
        if(strlen($message) > 300){
            $errors["too_long_message"] = 'message is too long ! 300 characters maximum are allowed';
        } 
        // if there is no error, we can send to DB
        if(empty($errors)) {
            $contact = $contactManager->sendMessageToDb($username,$email,$message);
        } else {
            $this->contactPage($errors);
        }
    }
    


    // REGISTER
    // registering the user
    function registerNewUser($username, $email, $password){
            
        $userManager = new \Project\Models\UserManager;
        // removing all illegals characters in email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // method to check user
        $checkUser = $userManager->checkUserExists($username);
        // method to check email 
        $checkEmail = $userManager->checkEmailExists($email);
        // then fetching
        $doesUserExists = $checkUser->fetch();
        $doesEmailExists = $checkEmail->fetch();
        


        if($doesUserExists){ // checking if the username is already in database from fetch
            echo 'This username already exists';
        } else if($doesEmailExists){ // checking if the email is already in database from fetch
            echo 'This e-mail already exists';
        } else{
            $register = $userManager->registerNewUser($username, $email, $password);
            require 'app/Views/login.php';
        }
    }
    


    // CONNECT
    // connecting the user 
    function connectUser($username, $password){
        
        $userManager = new \Project\Models\UserManager;
        $userConnect = $userManager->userMatching($username);
        $result = $userConnect->fetch();

        $isPasswordCorrect = password_verify($password, $result['password']);

        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['id'] = $result['id'];

        if($isPasswordCorrect){
            require 'app/Views/userprofile.php';
        } else{
            header('Location: index.php?action=profile');
        } 
    }

    // logout the user 
    function userLogout(){
        
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=homepage');
        exit();
    }


}