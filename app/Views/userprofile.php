<?php ob_start(); ?>
<?php
if(isset($_SESSION)){
?>
    <div class="vh">
        <h1>Hi, <?= $_SESSION['username'] ?> </h1> 

        <div class="profilebtns">
            <button class="profile_name_edit"><a href="index.php?action=updateProfileName"> Update your profile name</a></button>
            <button class="profile_delete"><a href="index.php?action=deleteProfile">Delete your Account</a></button>
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