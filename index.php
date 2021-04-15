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
            $userId = $_SESSION['id'];
            $controller->profilePage($userId);
        }

        else if($_GET['action'] == 'allgames'){ // returning the allgames.php view
            $viewController->allGamesPage();
        }
        
        else if($_GET['action'] == 'game'){ 
            $controller->SingleGamePage();
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
        // deleting the profile
        else if($_GET['action'] == 'deleteProfilePage'){
            $controller->deleteUserProfilePage();
        }
        else if($_GET['action'] == 'confirmUserDelete'){
            $id = $_SESSION['id'];
            $selectChoice = $_POST['choice'];
            $controller->deleteUser($id, $selectChoice);
        }
        // like games
        else if($_GET['action'] == 'like'){
            $gameId = $_GET['id'];
            $controller->likeGame($gameId);
        }

    } else{
        $viewController->homePage();
    }


} catch(Exception $e){
    die('Error: ' . $e->getMessage());
}