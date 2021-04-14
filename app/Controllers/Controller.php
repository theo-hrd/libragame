<?php 

namespace Project\Controllers;

use Project\Models\ContactManager;
use Project\Models\UserManager;
use Project\Models\ErrorManager;

class Controller{


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
        // veryfying if the email is correct
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors["invalid_email"] = "the e-mail is invalid."; 
        }

        if(empty($email)){
            $errors["required_email"] = "the e-mail is required.";
        }
        if(empty($message)){
            $errors["required_message"] =   "the message is required.";
        }
        if(strlen($message) > 300){
            $errors["too_long_message"] = 'message is too long ! 300 characters maximum are allowed.';
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
    function registerPage($errors =array()){
        require 'app/Views/register.php';
    }

    // registering the user
    function registerNewUser($username, $email, $confirmEmail, $password, $confirmPassword){
            
        $userManager = new \Project\Models\UserManager;

        // removing all illegals characters in email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        // hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $hash = $password;
        $confirmPass = password_verify($hash, $password);
        // hashing confirm password so I can verify after
        $confirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
        $confirmHash = $confirmPassword;
        $confirmConfirmPass = password_verify($confirmHash, $confirmPassword);

        // method to check user
        $checkUser = $userManager->checkUserExists($username);
        // method to check email 
        $checkEmail = $userManager->checkEmailExists($email);
        // then fetching both
        $doesUserExists = $checkUser->fetch();
        $doesEmailExists = $checkEmail->fetch();
        
        $errors = array();
        // checking if everything is filled
        if(empty($username) && (empty($email) && (empty($confirmEmail) && (empty($password) && (empty($confirmPassword)))))){ 
            $errors['form_not_filled'] = 'you need to fill the register form.';
        }
        // checking if the username is filled
        if(empty($username)){
            $errors['username_required'] = 'The username is required.';
        }
        // checking if the email is filled
        if(strlen($email) < 1){
            $errors['email_required'] = 'The e-mail is required.';
        }
        if($email === $confirmEmail && filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $errors['email_not_valid'] = 'the email is not valid';
        }
        // checking if the email confirmation is filled (strlen method and not empty or it will say error when the input is not even filled yet)
        if(strlen($confirmEmail) < 1){
            $errors['email_confirm_required'] = 'The e-mail confirmation is required.';
        }
        // checking if the password is filled
        if(empty($password)){
            $errors['password_required'] = 'The password is required.';
        }
        // checking if the password confirmation is filled
        if(empty($confirmPassword)){
            $errors['password_confirm_required'] = 'The password confirmation is required.';
        }
        // checking if the email matches the confirm email
        if($email !== $confirmEmail){
            $errors['emails_not_matching'] = 'the emails are not matching.';
        }
        // checking if the username is at least 4 characters long
        if(strlen($username) < 4){
            $errors['username_too_short'] = 'the username must be at least 4 characters long.';
        }
        // checking if the password matches the confirm password
        if($confirmPass !== $confirmConfirmPass){
            $errors['passwords_not_matching'] = 'the passwords are not matching.';
        } 
        // checking if the username is already in database from fetch
        if($doesUserExists){ 
            $errors['user_already_exists'] = 'The username already exists.';
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
    
    // redirecting to login.php
    function loginPage($errors = array()){
        require 'app/Views/login.php';
    }

    // connecting the user 
    function connectUser($username, $password){
        
        $userManager = new \Project\Models\UserManager;
        // checking if the user exists
        $userCheck = $userManager->checkUserExists($username);
        $doesUserExists = $userCheck->fetch();
        // getting the password from database 
        if($doesUserExists){
            $dbPassword = $userManager->userPassword($username)->fetch()["password"];
            $confirmPass = password_verify($password, $dbPassword);
        }

        $errors = array();

        // if the username and password are not filled
        if(empty($username) && empty($password)){
            $errors['form_not_filled'] = 'You need to fill the login form.';
        }
        // if the username is not filled
        if(empty($username)){
            $errors['required_username'] = 'The username is required.';
        }
        // if the password is not filled
        if(empty($password)){
            $errors['required_password'] = 'The password is required.';
        }
        // if the user does not exist
        if(!$doesUserExists){
            $errors['user_does_not_exist'] = 'This user does not exist, please register.';
        }
        // if the password isnt correct
        if($doesUserExists && !$confirmPass){
            $errors['password_incorrect'] = 'Password does not match username.';
        }

        // if the user and password match the user in db -> connect
        if($doesUserExists && $confirmPass){
            
            $_SESSION['username'] = $doesUserExists['username'];
            $_SESSION['password'] = $doesUserExists['password'];
            $_SESSION['id'] = $doesUserExists['id'];
            require 'app/Views/userprofile.php';
        } else{
            $this->loginPage($errors);
        }
        
    }

    // logout the user 
    function userLogout(){
        if(isset($_SESSION)){
            session_start();
            session_unset();
            session_destroy();
            header('Location: index.php?action=homepage');
            exit();
        }

    }
    
    

    // EDIT USERNAME
    function updateProfileNamePage($errors=array()){
        require 'app/Views/updateprofilename.php';
    }

    function updateProfileName($id, $username){
        $userManager = new \Project\Models\UserManager;

        // check if username already exists
        $userCheck = $userManager->checkUserExists($username);
        $doesUserExists = $userCheck->fetch();

        $errors = array();

        if($doesUserExists){
            $errors['username_already_taken'] = 'This username is already taken.';
        } 
        if(strlen($username) < 4){
            $errors['username_too_short'] = 'the username must be at least 4 characters long.';
        }
        if(empty($username)){
            $errors['username_required'] = 'You need to fill the username.';
        }

        if(empty($errors)){
            $updateUsername = $userManager->changeUsername($id, $username);
            session_unset();
            session_destroy();

            header('Location: index.php?action=login');
        }   else{
            $this->updateProfileNamePage($errors);
        }

    }


    //  DELETING USER
    function deleteUserProfilePage($errors=array()){
        require 'app/Views/deleteprofile.php';
    }

    function deleteUser($id, $selectChoice){
        
        $userManager = new \Project\Models\UserManager();
        // checking what the user chose
        if($selectChoice == 'yes'){
            $deleteUser = $userManager->deleteUser($id);
            session_unset();
            session_destroy();
            require 'app/Views/homepage.php';
        } else if($selectChoice == 'no'){
            header('Location: index.php?action=profile');
        }

    
    }


    // GAMES
    // Game details page (game.php)
    function singleGamePage($errors=array()){
        
        $likeManager = new \Project\Models\LikeManager();
        
        $findLike = $likeManager->findLike($_GET['id'], $_SESSION['id']);
        $isLiked = $findLike->fetch();

        $isLiked = !!$isLiked;
        // "bang bang"
        $countGame = $likeManager->countGame($_GET['id'])->fetch()[0];

        require 'app/Views/game.php';
    }

    // programming logic for likes on the game details (game.php)
    function likeGame($gameId){
        
        $errors = array();

        if(!isset($_SESSION['id'])){
            $errors['not_connected'] = 'You must be connected to like the game !';
        } else{
            $userId = $_SESSION['id'];
            
            $likeManager = new \Project\Models\LikeManager();
            $findLike = $likeManager->findLike($gameId, $userId);
            $isLiked = $findLike->fetch();

            // if the game is liked, you can dislike it, else, you can like it
            if($isLiked){
                $dislike = $likeManager->dislikeGame($gameId,$userId);
            } else{
                $like = $likeManager->likeGame($gameId,$userId);
            }
            
        }
        // redirecting to the same game page after the like/dislike
        header("Location: index.php?action=game&id=$gameId");
        
    
    }
    
    // redirecting to userprofile.php
    function profilePage($userId){
        $likeManager = new \Project\Models\LikeManager();

        $likedGames = $likeManager->retrieveLikedGame($userId)->fetchAll();
        require 'app/Views/userprofile.php';
    }
    
    
}