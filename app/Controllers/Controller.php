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
    // sending the form
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
    
    // redirecting to register.php
    function registerPage($errors=array()){
        require 'app/Views/register.php';
    }

    // registering the user
    function registerNewUser($username, $email,$confirmEmail, $password, $confirmPassword){
            
        $userManager = new \Project\Models\UserManager;

        // removing all illegals characters in email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $confirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
        // method to check user
        $checkUser = $userManager->checkUserExists($username);
        // method to check email 
        $checkEmail = $userManager->checkEmailExists($email);
        // then fetching
        $doesUserExists = $checkUser->fetch();
        $doesEmailExists = $checkEmail->fetch();
        
        $errors = array();

        // checking if the email matches the confirm email
        if($email !== $confirmEmail){
            $errors['emails_not_matching'] = 'the emails are not matching.';
        }
        // checking if the username is at least 4 characters long
        if(strlen($username) < 4){
            $errors['username_too_short'] = 'the username must be at least 4 characters long.';
        }
        // checking if the password matches the confirm password
        if($password !== $confirmPassword){
            $errors['passwords_not_matching'] = 'the passwords are not matching.';
        }
        // checking if everything is filled
        if(empty($username) && (empty($email) && (empty($confirmEmail) && (empty($password) && (empty($confirmPassword)))))){ 
            $errors['form_not_filled'] = 'you need to fill the register form entirely.';
        }
        // checking if the username is already in database from fetch
        if($doesUserExists){ 
            $errors['user_already_exists'] = 'The username already exists';
        }
        // checking if the email is already in database from fetch
        if($doesEmailExists){ 
            $errors['email_already_exists'] = 'the e-mail already exists.';
        }
        if(empty($errors)){
            $register = $userManager->registerNewUser($username, $email,$password);
            require 'app/Views/login.php';
        } else{
            $this->registerPage($errors);
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