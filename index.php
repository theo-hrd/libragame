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

        switch($_GET['action']){
    
            // --------------------------------------------------------------------------
            //  Views with no logic applied from the Controller
            // --------------------------------------------------------------------------

            // returning the homepage.php view
            case 'homepage':
                $viewController->homePage();
                break;

            // returning the userprofile.php view
            case 'profile':
                $userId = $_SESSION['id'];

                $controller->profilePage($userId);
                break;

            // returning the allgames.php view
            case 'allgames':
                $viewController->allGamesPage();
                break;


            // --------------------------------------------------------------------------
            //  Views and logic applied from the Controller for the games
            // --------------------------------------------------------------------------


            // returning the game.php view
            case 'game':
                $controller->SingleGamePage();
                break;

            // like games
            case 'like':
                $gameId = $_GET['id'];

                $controller->likeGame($gameId);
                break;




            // --------------------------------------------------------------------------
            // Views and logic applied from the Controller for the Contact page
            // --------------------------------------------------------------------------

            // returning the contact.php view
            case 'contact':
                $controller->contactPage();
                break;

            // CONTACT VIEW AND SENDER
            case 'contactSender':
                $subject = htmlspecialchars($_POST['subject']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['msg']);
                    
                $controller->contactSender($subject, $email, $message);
                break;



            // --------------------------------------------------------------------------
            // Views and logic applied from the Controller for the user
            //  REGISTER/CONNECT/DISCONNECT/UPDATE USERNAME/DELETE USER (by order)
            // --------------------------------------------------------------------------


            // REGISTER
            // returning the view to connect the user (register.php)
            case 'register':
                $controller->registerPage();
                break;

            // creating a new user in the database
            case 'registerNewUser':
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $confirmEmail = htmlspecialchars($_POST['confirmEmail']);
                $password = htmlspecialchars($_POST['password']); 
                $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
        
                $controller->registerNewUser($username, $email, $confirmEmail,$password, $confirmPassword);
                break;
        

            //  --- CONNECT ---

            // returning the login.php view
            case 'login':
                $controller->loginPage();
                break;
        
            // starting the session to connect the user
            case 'connectUser':
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
        
                $controller->connectUser($username,$password);
                break;


            // --- DISCONNECT ---
             // disconnecting the user 
            case 'logout':
                $controller->userLogout();
                break;


            // --- UPDATE USERNAME ---
            // updating profile name page
            case 'updateProfileName':
                $controller->updateProfileNamePage();
                break;

            // form to update the name
            case 'uploadProfileName':
                $id = $_SESSION['id'];
                $username = htmlspecialchars($_POST['username']);
                $username = str_replace(' ', '', $username);
        
                $controller->updateProfileName($id, $username);
                break;


            // --- DELETE USER ---
            // returning the deleteprofile.php view
            case 'deleteProfilePage':
                $controller->deleteUserProfilePage();
                break;  

            // deleting the profile
            case 'confirmUserDelete':
                $id = $_SESSION['id'];
                $selectChoice = $_POST['choice'];

                $controller->deleteUser($id, $selectChoice);
                break;
        } 

    } else{
        $viewController->homePage();
    }

} catch(Exception $e){
    die('Error: ' . $e->getMessage());
}


