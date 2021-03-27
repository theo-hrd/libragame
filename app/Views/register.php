<?php ob_start(); ?>



<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Register a new account</h2>
        
        <form action="index.php?action=contactSender" method="post">
            
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username">

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail">

            <label for="confirmEmail">Confirm e-mail</label>
            <input type="email" name="confirmEmail" placeholder="confirm your e-mail">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password">

            <label for="confirmPassword">Confirm password</label>
            <input type="password" name="confirmPassword" placeholder="Confirm your password"> <br>
            
            <input type="submit" value="Send">

        </form>

        <p class="not_registered">Already have an account yet ? <a href="index.php?action=login">Connect here</a></p>

    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>
