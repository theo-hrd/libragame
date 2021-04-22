<?php ob_start(); ?>
<?php
// if there is a session go to the userprofile, else go to the login page
if(isset($_SESSION)){
?>
    <div class="vh">
        <h1>Hi, <?= $_SESSION['username'] ?> ! How are you doing ?</h1> 

        <div class="profilebtns">
            <button class="profile_name_edit" data-aos="fade-left"><a href="index.php?action=updateProfileName" > Update your profile name</a></button>
            <button class="profile_delete" data-aos="fade-right"><a href="index.php?action=deleteProfilePage" >Delete your Account</a></button>
        </div>

        <div class="liked_games">
            <h2 class="title_liked">Here are your last liked games</h2>
                
                    <div id="liked_game_profile" class="game_title">
                        
                    </div>

        </div>
    </div>
    
    <!-- calling the script to get the liked games of the user -->
    <script src="app/public/js/likedGame.js"></script>
    <!-- calling the ajax function to get the likedgames in php (kind of clunky but its the only way) -->
    <script>
        retrieveGames(<?php echo json_encode($likedGames) ?>);
    </script>

    
<?php
} else{
        header('Location : index.php?action=login');
    }
?>

<?php $content = ob_get_clean();  //PHP function to inject the template ?> 
<?php require 'templates/template.php'; ?>