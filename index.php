<?php
//index.php = 1st page read by the browser. We define our routes with actions for the user here. 
session_start();

require_once __DIR__ . '/vendor/autoload.php'; 

use Project\Controllers\Controller;


try{
    
    $controller = new Controller();

    if(isset($_GET['action'])){
        if($_GET['action'] == 'homepage'){ //returning the homepage.php view
            $controller->homePage();
        }
        else if($_GET['action'] == 'contact'){ //returining the contact.php view
            $controller->contactPage();
        }
        else if($_GET['action'] == 'login'){ //returning the login.php view
            $controller->loginPage();
        }
        else if($_GET['action'] == 'register'){ //returning the register.php view
            $controller->registerPage();
        }
        else if($_GET['action'] == 'registerNewUser'){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $confirmEmail = htmlspecialchars($_POST['confirmEmail']);
                $password = htmlspecialchars($_POST['password']); // refactor this into only one variable if possible 
                $password = password_hash($password, PASSWORD_DEFAULT); // try $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
                $confirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
                
                // handling the errors (maybe put it somewhere else: controller maybe ?)

                // checking if everything is filled
                if(!empty($username) && (!empty($email) && (!empty($confirmEmail)&& (!empty($password) && (!empty($confirmPassword)))))){ 
                    $controller->registerNewUser($username, $email, $confirmEmail ,$password, $confirmPassword);
                } else{
                    throw new Exception('you need to fill the register form entirely.');
                }
                // checking if the email matches the confirm email
                if($email === $confirmEmail){
                    $controller->registerNewUser($username, $email, $confirmEmail ,$password, $confirmPassword);
                }else{
                    throw new Exception('the emails are not matching');
                }
                // checking if the password matches the confirm password
                if($password !== $confirmPassword){
                    $controller->registerNewUser($username, $email, $confirmEmail ,$password, $confirmPassword);
                } else{
                    throw new Exception('the passwords are not matching');
                }
                
                if($password !== $confirmPassword && $email === $confirmEmail){
                    $controller->registerNewUser($username, $email, $confirmEmail ,$password, $confirmPassword);
                } else{
                    throw new Exception('the credentials are not matching');
                }
                
            }
        }
        else if($_GET['action'] == 'contactSender'){ //sending contact message 
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['msg']);
                
                if(!empty($username) && (!empty($email) && (!empty($message)))){
                    $controller->contactSender($username, $email, $message);
                } else{
                    throw new Exception('You need to fill the form entirely');
                }   
            }
        }

    } 
    else{
        $controller->homePage();
    }



} catch(Exception $e){
    die('Error: ' . $e->getMessage());
}