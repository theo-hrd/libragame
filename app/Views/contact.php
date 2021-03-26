<?php ob_start(); ?>

<div class="container">

    <div class="contact_card">
        
        <h1>Contact me</h1>
        
        <form action="" method="post">
            
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" placeholder="Your first name"> 

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" placeholder="Your last name"> 

            <label for="mail">E-mail</label>
            <input type="email" name="mail" placeholder="Your e-mail">

            <label for="msg">Message</label>
            <textarea name="msg" cols="40" rows="5" placeholder="Your message (300 characters maximum)"></textarea>
            <br>

            <input type="submit" value="Send">

        </form>

    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>
