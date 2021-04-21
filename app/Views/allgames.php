<?php ob_start(); ?>

<div class="container">
    
    <div id="game_categories">
        <!-- retrieving the game categories from the API (genres.js)-->
    </div>

    <div>
        <input type="text" id="searchGame" placeholder="Search for a game">
    </div>

</div>


<div class="outline"></div>

<div class="container">
    
    <div id="games"> 
    <!-- retrieving the games of a given category from the API (genres.js)-->

    </div>
    
</div>

<div id="pagination"></div>


<script src="app/Public/js/genres.js"></script>
<script src="app/Public/js/game.js"></script>
<script src="app/Public/js/search.js"></script>

<?php $content = ob_get_clean();  //PHP function to inject the template ?> 
<?php require 'templates/template.php'; ?>