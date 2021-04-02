<?php ob_start(); ?>

<div class="container">
    <div id="game_categories">
        <!-- retrieving the game categories from the API -->
    </div>
</div>


<div class="outline"></div>

<div class="games"> 
    games
</div>







<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>