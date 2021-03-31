<?php 

namespace Project\Controllers;

use PDO;
use Project\Models\ContactManager;
use Project\Models\UserManager;


class Controller{

    function contactSender($username, $email, $message){
        $contactManager = new \Project\Models\ContactManager;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $contact = $contactManager->sendMessageToDb($username,$email,$message);
            require 'app/Views/contactsuccess.php';
        } else{
            header('Location: app/Views/error.php');
        }
    }

    // function registerNewUser($username, $email, $password){
    //     $userManager = new \Project\Models\UserManager;
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $checkuser = $userManager->checkUserExists();
    //     // retrieve email and username 'verify'
    //     // RETURN result in controller
    //     $register = $userManager->registerNewUser($username, $email, $password);
    //     // if(exists){
    //         // echo user already exists
    //         //} else {

    //         // }
    // }
    //     // if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     //     $register = $userManager->registerNewUser($username, $email, $password);
    //     //     require 'app/Views/userprofile.php';
    //     // }else{
    //     //     header('Location: error.php');
    //     // }


    function connectUser($username, $password){
        $userManager = new \Project\Models\UserManager;
        $userConnect = $userManager->retrievePass($username,$password);
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
        }
    }
}