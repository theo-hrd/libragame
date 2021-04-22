<?php ob_start(); ?>    

<div class="container">
    <div id="game">
        <div id="game_details">
            <button class="like_btn" data-aos="flip-down"><a id="like_link"> <?= $isLiked ? "Liked !" : "Like" ?> (<?= " liked $countGame times by Libragamers "?>)</a></button>
            <?php
                if(isset($_SESSION['errors']["not_connected"])){
            ?>
                    <span class="error" id="error">
            <?php 
                    echo $_SESSION['errors']["not_connected"];
                    unset($_SESSION['errors']);
            ?>
                    </span>
            <?php
            }
            ?>
        <!-- output of game.js -->
        </div>
    </div>
</div>


<!-- simple script to set an animation on the error -->
<script>
    if(document.body.contains(error)){
        setTimeout(function(){
            document.getElementById('error').remove();
        }, 2500);
    }
</script>













<script src="app/Public/js/game.js"></script>


<?php $content = ob_get_clean();  //PHP function to inject the template ?> 
<?php require 'templates/template.php'; ?>