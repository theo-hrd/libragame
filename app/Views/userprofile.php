<?php ob_start(); ?>

<h1>Hi, <?= $_SESSION['username'] ?> </h1> 

<div class="liked_games">
    <p>Here are your last liked games</p>
    <!-- retrieve liked games from sql -->
</div>















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>