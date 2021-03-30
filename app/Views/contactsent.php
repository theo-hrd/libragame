<?php ob_start(); ?>    

<div class="contactsent">

    <h1> Message Sent, I will answer ASAP !</h1>





</div>
















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>