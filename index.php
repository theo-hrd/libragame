<?php
//index.php = 1st page read by the browser. We define our routes with actions for the user here. 
session_start();

require_once __DIR__ . '/vendor/autoload.php'; 

use Project\Controllers\Controller;
use Project\Controllers\ViewController;

try{
    
    $controller = new Controller();
    $viewController = new ViewController();
    
    if(isset($_GET['action'])){
        
        if($_GET['action'] == 'homepage'){ // returning the homepage.php view
            $viewController->homePage();
        }

        else if($_GET['action'] == 'profile'){ // returning the userprofile.php view
            $viewController->profilePage();
        }

        else if($_GET['action'] == 'allgames'){ // returning the allgames.php view
            $controller->allGamesPage();
        }

        // CONTACT VIEW AND SENDER
        else if($_GET['action'] == 'contact'){ // returning the contact.php view
            $controller->contactPage();
        }
        else if($_GET['action'] == 'contactSender'){ //sending contact message 
            
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['msg']);
            
            $controller->contactSender($username, $email, $message);
        }



        // USER REGISTER VIEW AND REGISTERING NEW USER
        else if($_GET['action'] == 'register'){ // returning the register.php view
            $controller->registerPage();
        }

        else if($_GET['action'] == 'registerNewUser'){ // creating a new user in the database
            
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $confirmEmail = htmlspecialchars($_POST['confirmEmail']);
            $password = htmlspecialchars($_POST['password']); 
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

            $controller->registerNewUser($username, $email, $confirmEmail,$password, $confirmPassword);
        }


        // USER CONNECT AND DISCONNECT 
        else if($_GET['action'] == 'login'){ // returning the login.php view
            $controller->loginPage();
        }

        else if($_GET['action'] == 'connectUser'){ // starting the session to connect the user
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $controller->connectUser($username,$password);
            
            //add error handlers such as username not existing or wrong password.
        }

        else if($_GET['action'] == 'logout'){ // returning the logout.php view
            $controller->userLogout();
        }


        // updating profile name page
        else if($_GET['action'] == 'updateProfileName'){
            $controller->updateProfileNamePage();
        }
        // form to update the name
        else if($_GET['action'] == 'uploadProfileName'){
            $id = $_SESSION['id'];
            $username = htmlspecialchars($_POST['username']);
            $username = str_replace(' ', '', $username);
            $controller->updateProfileName($id, $username);
        }


    } else{
        $viewController->homePage();
    }


} catch(Exception $e){
    die('Error: ' . $e->getMessage());
}