<?php
require_once './layouts/header.php';
?>

<h1>Contact me</h1>

<div class="contact">
    
    <div class="container">
        <form action="" method="post">
            <div class="form_separator">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" placeholder="Your first name"> <br> <br>
            </div>


            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Your last name"> <br> <br>

            <label for="mail">E-mail</label>
            <input type="email" id="mail" name="mail" placeholder="Your e-mail"> <br> <br>

            <label for="msg">Message</label>
            <textarea name="msg" id="msg" cols="40" rows="5" placeholder="Your message"></textarea>
            <br>
            <input type="submit" value="Send">
        </form>

    </div>

</div>













<?php
require_once './layouts/footer.php';
?>