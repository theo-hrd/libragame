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
            else if($_GET['action'] == 'registerNewUser'){
                
                if(isset($_POST['submit'])){
                    $username = htmlspecialchars($POST['username']);
                    $email = htmlspecialchars($POST['email']);
                    $email2 = htmlspecialchars($POST['email2']);
                    $password = htmlspecialchars($POST['password']); // refactor this into only one variable if possible 
                    $password = password_hash($password, PASSWORD_DEFAULT); // try $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $confirmPassword = htmlspecialchars($POST['confirmPassword']);
                    $confirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
                    
                    if(!empty($username) && (!empty($email) && (!empty($email2) && (!empty($password) && (!empty($password2)))))){
                        $controller->registerNewUser($username, $email, $email2, $password, $password2);
                    } else{
                        throw new Exception('you need to fill the register form entirely.');
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