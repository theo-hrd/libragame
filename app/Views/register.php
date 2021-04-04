<?php ob_start(); ?>



<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Register a new account</h2>
        
        <form action="index.php?action=registerNewUser" method="post">
            
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username">
            <?php
                if(isset($errors["username_too_short"])){
                    echo $errors["username_too_short"];
                }
            ?>
            <?php
                if(isset($errors["user_already_exists"])){
                    echo $errors["user_already_exists"];
                }
            ?>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail">
            
            <?php
                if(isset($errors["email_already_exists"])){
                    echo $errors["email_already_exists"];
                }
            ?>
            <label for="confirmEmail">Confirm e-mail</label>
            <input type="email" name="confirmEmail" placeholder="confirm your e-mail">
            <?php
                if(isset($errors["emails_not_matching"])){
                    echo $errors["emails_not_matching"];
                }
            ?>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password">

            <label for="confirmPassword">Confirm password</label>
            <input type="password" name="confirmPassword" placeholder="Confirm your password"> <br>
            <?php
                if(isset($errors["passwords_not_matching"])){
                    echo $errors["passwords_not_matching"];
                }
            ?>
            <?php
                if(isset($errors["form_not_filled"])){
                    echo $errors["form_not_filled"];
                }
            ?>
            <input type="submit" value="Send">

        </form>

        <p class="not_registered">Already have an account yet ? <a href="index.php?action=login">Connect here</a></p>

    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>
