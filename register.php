<?php require_once './layouts/header.php'; ?>



<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Register a new account</h2>
        
        <form action="" method="post">
            
            <label for="firstName">First Name</label>
            <input type="text" name="username" placeholder="Your first name">
            
            <label for="username">Last Name</label>
            <input type="text" name="lastName" placeholder="Your last name">

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail">

            <label for="email2">Confirm e-mail</label>
            <input type="email2" name="email2" placeholder="confirm your e-mail">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password">

            <label for="password2">Confirm password</label>
            <input type="password2" name="password2" placeholder="Confirm your password"> <br>
            
            <input type="submit" value="Send">

        </form>

        <p class="not_registered">Already have an account yet ? <a href="login.php">Connect here</a></p>

    </div>

</div>

<?php require_once './layouts/footer.php'; ?>