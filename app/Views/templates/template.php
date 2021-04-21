<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Libragame is a Web Application to look for new games to buy.">
    <!-- style -->
    <link rel="stylesheet" href="./app/public/styles/style.css">
    <!-- js animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Lexend:wght@300&family=Open+Sans&display=swap" rel="stylesheet">
    <title>LibraGame - The Library for your next game. </title>
</head>

<body>
    
    <header>
            <!-- navbar -->
            <nav class="navbar">
                
                <span class="navbar_toggle" id="js-navbar-toggle">
                    <svg viewBox="0 0 100 60" width="23" height="23">
                        <rect width="100" height="20" rx="8" fill="white"></rect>
                        <rect y="30" width="100" height="20"  rx="8" fill="white"></rect>
                        <rect y="60" width="100" height="20"  rx="8" fill="white"></rect>
                    </svg>
                </span>

                <a href="index.php?action=homepage" class="brand_name">LibraGame</a>

                <ul class="main_nav" id="js-menu">
                    <li><a href="index.php?action=allgames" class="nav_links">Browse Games</a></li>
                    <li><a href="index.php?action=contact" class="nav_links">Contact</a></li>
                    <?php 
                        if(isset($_SESSION['id'])){
                            echo "<li><a href='index.php?action=profile' class='nav_links'>Profile</a></li>";
                            echo "<li><a href='index.php?action=logout' class='nav_links'>Logout</a></li>";
                        } else{
                            echo "<li><a href='index.php?action=login' class='nav_links'>Login</a></li>";
                        }
                    ?>
                </ul>
            </nav>
            
    </header>


        <!-- retrieving the whole content from other pages -->
        <div class="main">
            <?= $content ?>
        </div>

        
        
    <footer>
        <a href='https://github.com/theo-hrd'>Théo Hérédia</a>
        <a href='https://rawg.io/apidocs'>RAWG API</a>
    </footer>


    <script type="text/javascript" src="app/public/js/menu.js"></script>
    
    <!-- script to start AOS (animations library) -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    

</body>
</html>