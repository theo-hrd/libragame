<?php require_once './layouts/header.php'; ?>


<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Connect to your account</h2>
        
        <form action="" method="post">
            
            <label for="username">Username</label>
            <input name="username" placeholder="Your username">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password"> <br>
            
            <input type="submit" value="Send">

        </form>

        <p class="not_registered">You don't have an account yet ? <a href="register.php">Register here</a></p>

    </div>

</div>

<?php require_once './layouts/footer.php'; ?>