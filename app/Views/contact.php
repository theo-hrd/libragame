<?php ob_start(); ?>

<div class="container">

    <div class="contact_card" data-aos="fade-down">
        
        <h1 class="h1contact">Contact me</h1>
        
        <form action="index.php?action=contactSender" method="post">
            
            <label for="username">Subject</label>
            <input type="text" name="subject" placeholder="Subject (not required)"> 

            <label for="mail">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail (required)" required>

            <span class="error">
                <?php
                    if(isset($errors["invalid_email"])){
                        echo $errors["invalid_email"];
                    }
                ?>
            </span>

            <span class="error">
                <?php
                    if(isset($errors["required_email"])){
                        echo $errors["required_email"];
                    }
                ?>
            </span>

            <label for="msg">Message</label>
            <textarea name="msg" cols="40" rows="5" placeholder="Your message (300 characters maximum) (required)" required></textarea>
            <span class="error">
                <?php
                    if(isset($errors["required_message"])){
                        echo $errors["required_message"];
                    }
                ?>
            </span>

            <span class="error">
                <?php
                    if(isset($errors["too_long_message"])){
                        echo $errors["too_long_message"];
                    }
                ?>
            </span>

            <br>

            <input type="submit" value="Send">
            
        </form>
    </div>

</div>

<?php $content = ob_get_clean();  //PHP function to inject the template ?> 
<?php require 'templates/template.php'; ?>