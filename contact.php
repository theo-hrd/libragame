<?php require_once './layouts/header.php'; ?>

<?php
    if(isset($_POST["submit"])){
        echo 'Message sent !';
    }
?>


<div class="container">

    <div class="contact_card">
        
        <h1>Contact me</h1>
        
        <form action="" method="post">
            
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="Your first name"> 

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Your last name"> 

            <label for="mail">E-mail</label>
            <input type="email" id="mail" name="mail" placeholder="Your e-mail">

            <label for="msg">Message</label>
            <textarea name="msg" id="msg" cols="40" rows="5" placeholder="Your message"></textarea>
            <br>

            <input type="submit" value="Send">

        </form>

    </div>

</div>


<?php require_once './layouts/footer.php'; ?>