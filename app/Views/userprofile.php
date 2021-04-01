<?php ob_start(); ?>

<h1>Hi, <?= $_SESSION['username'] ?> </h1> 

















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>