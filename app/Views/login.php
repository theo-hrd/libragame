<?php ob_start(); ?>


<div class="container">
    
    <div class="connect_card">
        
        <h2 class="connect_title">Connect to your account</h2>
        
        <form action="index.php?action=connectUser" method="post">
            
            <label for="username">Username</label>
            <input name="username" placeholder="Your username">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password"> <br>
            
            <input type="submit" value="Send">

        </form>

        <p class="not_registered">You don't have an account yet ? <a href="index.php?action=register">Register here</a></p>

    </div>

</div>

<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>