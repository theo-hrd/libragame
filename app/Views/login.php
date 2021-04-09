<?php ob_start(); ?>


<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Connect to your account</h2>
        
        <form action="index.php?action=connectUser" method="post">
            
            <label for="username">Username</label>
            <input name="username" placeholder="Your username" required>
            <span class="error">
                <?php
                    if(isset($errors["required_username"])){
                        echo $errors["required_username"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["user_does_not_exist"])){
                        echo $errors["user_does_not_exist"];
                    }
                ?>
            </span>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password" required> <br>
            
            <span class="error">
            <span class="error">
                <?php
                    if(isset($errors["form_not_filled"])){
                        echo $errors["form_not_filled"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["required_password"])){
                        echo $errors["required_password"];
                    }
                ?>
            </span>
            <span class="error">
                <?php
                    if(isset($errors["password_incorrect"])){
                        echo $errors["password_incorrect"];
                    }
                ?>
            </span>

            <input type="submit" value="Send">

        </form>

        <p class="not_registered">You don't have an account yet ? <a href="index.php?action=register">Register here</a></p>

    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>