<?php ob_start(); ?>



<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Register a new account</h2>
        
        <form action="index.php?action=registerNewUser" method="post">
            
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username">
            <span class="error">
                <?php
                    if(isset($errors["username_required"])){
                        echo $errors["username_required"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["username_too_short"])){
                        echo $errors["username_too_short"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["user_already_exists"])){
                        echo $errors["user_already_exists"];
                    }
                ?>
            </span>


            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail">
            <span class="error">
                <?php
                    if(isset($errors["email_required"])){
                        echo $errors["email_required"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["email_already_exists"])){
                        echo $errors["email_already_exists"];
                    }
                ?>
            </span>

            <label for="confirmEmail">Confirm e-mail</label>
            <input type="email" name="confirmEmail" placeholder="confirm your e-mail">
            <span class="error">
                <?php
                    if(isset($errors["email_not_valid"])){
                        echo $errors["email_not_valid"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["email_confirm_required"])){
                        echo $errors["email_confirm_required"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["emails_not_matching"])){
                        echo $errors["emails_not_matching"];
                    }
                ?>
            </span>
            
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password">
            <span class="error">
                <?php
                    if(isset($errors["password_required"])){
                        echo $errors["password_required"];
                    }
                ?>
            </span>
            
            <label for="confirmPassword">Confirm password</label>
            <input type="password" name="confirmPassword" placeholder="Confirm your password"> <br>
            <span class="error">
                <?php
                    if(isset($errors["password_confirm_required"])){
                        echo $errors["password_confirm_required"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["passwords_not_matching"])){
                        echo $errors["passwords_not_matching"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["form_not_filled"])){
                        echo $errors["form_not_filled"];
                    }
                ?>
            </span>

            <input type="submit" value="Send">

        </form>

        <p class="not_registered">Already have an account yet ? <a href="index.php?action=login">Connect here</a></p>

    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>
