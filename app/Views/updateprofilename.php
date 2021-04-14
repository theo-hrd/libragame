<?php ob_start(); ?>

<div class="vh">
    <div class="upload">
        <form action="index.php?action=uploadProfileName" method="post">
            <input type="text" name="username" placeholder="Your new username" required>
            
            <span class="error">
                <?php
                    if(isset($errors["username_already_taken"])){
                        echo $errors["username_already_taken"];
                    }
                ?>
            </span>
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
            
            <button type="submit" name="submit" class="profile_name_send">Submit your new profile name</button>
        </form>
    </div>

</div>




















<?php $content = ob_get_clean();  //PHP function to inject the template ?> 
<?php require 'templates/template.php'; ?>