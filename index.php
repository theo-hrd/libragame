<?php
//index.php = 1st page read by the browser. We define our routes with actions for the user here. 
session_start();

require_once __DIR__ . '/vendor/autoload.php'; 

use Project\Controllers\Controller;
USE Project\Controllers\ViewController;

try{
    
    $controller = new Controller();
    $viewController = new ViewController();
    if(isset($_GET['action'])){
        
        if($_GET['action'] == 'homepage'){ //returning the homepage.php view
            $viewController->homePage();
        }
        else if($_GET['action'] == 'contact'){ //returining the contact.php view
            $viewController->contactPage();
        }
        else if($_GET['action'] == 'login'){ //returning the login.php view
            $viewController->loginPage();
        }
        else if($_GET['action'] == 'profile'){ // returning the userprofile.php view
            $viewController->profilePage();
        }
        else if($_GET['action'] == 'connectUser'){ // starting the session to connect the user
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if(!empty($username) && (!empty($password))){
                $controller->connectUser($username,$password);
            } else{
                throw new Exception('You need to fill all the fields');
            }
            //add error handlers such as username not existing or wrong password.
        }
        else if($_GET['action'] == 'register'){ //returning the register.php view
            $viewController->registerPage();
        }
        else if($_GET['action'] == 'registerNewUser'){ // creating a new user in the database
            
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $confirmEmail = htmlspecialchars($_POST['confirmEmail']);
            $password = htmlspecialchars($_POST['password']); 
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

            

            // checking if everything is filled
            if(!empty($username) && (!empty($email) && (!empty($confirmEmail) && (!empty($password) && (!empty($confirmPassword)))))){ 
                $controller->registerNewUser($username, $email,$password);
            } else{
                throw new Exception('you need to fill the register form entirely.');
            }

            // handling the errors (maybe put it somewhere else: controller maybe ?)
            
            // checking if the email matches the confirm email
            if($email !== $confirmEmail){
                throw new Exception('the emails are not matching');
            }
            if($username < 4){
                throw new Exception('the username must be at least 4 characters long');
            }

            // checking if the password matches the confirm password
            if($password !== $confirmPassword){
                throw new Exception('the passwords are not matching');
            }
            // checking if the email AND password are matching together 
            if($password !== $confirmPassword && $email !== $confirmEmail){
                throw new Exception('the credentials are not matching');
            }
        }
        else if($_GET['action'] == 'logout'){ // returning the logout.php view
            $controller->userLogout();
        }
        else if($_GET['action'] == 'contactSender'){ //sending contact message 
            
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['msg']);
                
                if(!empty($username) && (!empty($email) && (!empty($message)))){
                    $controller->contactSender($username, $email, $message);
                } else{
                    throw new Exception('You need to fill the form entirely');
                }   
        }

    } else{
        $viewController->homePage();
    }


} catch(Exception $e){
    die('Error: ' . $e->getMessage());
}