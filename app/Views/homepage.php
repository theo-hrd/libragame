<?php ob_start(); ?>
    <main>

        <!-- background image -->
        <img class="bg_img" src="app/public/images/bg1080-min.jpg" alt="background image">
        <!-- main title -->
        <div class="main_title">
            <h1>LibraGame</h1>
            <p>The library for your next game.</p>
        </div>
        
        <div class="container">
            
            <!-- "browse games" button -->
            <section class="cta_section">
                <button class="cta"><a href="index.php?action=allgames">Browse games</a></button>
            </section>

            <!-- some games featured from rawg api -->
            <div class="featured_games">
                <h2>Featured games:</h2>
                <div id="featured_game_card"></div>
            </div>

        </div>
    </main>

    <?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>
