<?php ob_start(); ?>    

<div class="container">
    <div id="game">
        <div id="game_details">
            <button class="like_btn"><a id="like_link"> <?= $isLiked ? "Liked !" : "Like" ?> (<?= " liked $countGame times by Libragame users"?>)</a></button>
            <?php
                if(isset($errors["not_connected"])){
                    echo $errors["not_connected"];
                }
            ?>
        <!-- output of game.js -->
        </div>
    </div>
</div>


















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>