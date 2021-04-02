<?php 

namespace Project\Controllers;

use Project\Models\ContactManager;
use Project\Models\UserManager;


class Controller{

    // redirecting to contact.php
    function contactPage($errors=array()){
        require 'app/Views/contact.php';
    }

    function contactSender($username, $email, $message){
        $contactManager = new \Project\Models\ContactManager;
        // Removing all illegal characters from email
        $errors = \Project\Models\ContactManager::errors($email, $message);

        if(empty($errors)) {
            $contact = $contactManager->sendMessageToDb($username,$email,$message);
        } else {
            $this->contactPage($errors);
        }

    }
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

    // registering the user
    function registerNewUser($username, $email, $password){
        $userManager = new \Project\Models\UserManager;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $checkUser = $userManager->checkUserExists($username);
        $checkEmail = $userManager->checkEmailExists($email);
        $doesUserExists = $checkUser->fetch();
        $doesEmailExists = $checkEmail->fetch();
        
        // checking if the username is already in database from fetch
        if($doesUserExists){
            echo 'This username already exists';
        } else if($doesEmailExists){ // checking if the email is already in database from fetch
            echo 'This e-mail already exists';
        } else{
            $register = $userManager->registerNewUser($username, $email, $password);
            require 'app/Views/login.php';
        }
    }
}