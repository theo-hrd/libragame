<?php ob_start(); ?>    

<div class="vh">
    <div class="contact_card">
        <h1> Message Sent, I will answer to your email adress ASAP !</h1>
    </div>
</div>





<?php $content = ob_get_clean();  //PHP function to inject the template ?> 
<?php require 'templates/template.php'; ?>