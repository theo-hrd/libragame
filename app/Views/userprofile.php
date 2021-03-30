<?php ob_start(); ?>

<h1>profile of the user</h1> 

















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>