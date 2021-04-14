<?php ob_start(); ?>

<div class="container">
    <div id="game_categories">
        <!-- retrieving the game categories from the API (genres.js)-->
    </div>
</div>

<div class="outline"></div>

<div class="container">
    <div id="games"> 
    <!-- retrieving the games of a given category from the API (genres.js)-->

    </div>
    
</div>







<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>