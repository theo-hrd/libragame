<?php ob_start(); ?>

<div class="container">

    <div class="contact_card">
        
        <h1>Contact me</h1>
        
        <form action="index.php?action=contactSender" method="post">
            
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username"> 

            <label for="mail">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail (required)" required>

            <span class="error">
                <?= $errors["invalid_email"]; ?>
            </span>

            <span class="error">
                <?= $errors["required_email"]; ?>
            </span>

            <label for="msg">Message</label>
            <textarea name="msg" cols="40" rows="5" placeholder="Your message (300 characters maximum) (required)" required></textarea>
            <span class="error">
                <?= $errors["required_message"]; ?>
            </span>

            <span class="error">
                <?= $errors["too_long_message"]; ?>
            </span>

            <br>

            <input type="submit" value="Send">
            
        </form>
    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>