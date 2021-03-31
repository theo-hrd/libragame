<?php ob_start(); ?>    

<div class="contact_done">
    <h1> Message Sent, I will answer to your email adress ASAP !</h1>
</div>




<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>