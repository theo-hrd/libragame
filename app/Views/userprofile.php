<?php ob_start(); ?>
<?php
if(isset($_SESSION)){
?>
    <div class="vh">
        <h1>Hi, <?= $_SESSION['username'] ?> </h1> 

        <h2> profile picture</h2>
        <img src="" alt="">

        <div class="profilepicbtns">
            <button class="profile_pic_edit"><a href="index.php?action=updateProfilePicture"> Update your profile picture</a></button>
            <button class="profile_pic_delete"><a href="index.php?action=deleteProfilePicture">Delete your profile picture</a></button>
        </div>



        <div class="liked_games">
            <p>Here are your last liked games</p>
            <!-- retrieve liked games from sql -->
        </div>
    </div>  
<?php
    } else{
            header('Location : index.php?action=login');
        }
?>
















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>