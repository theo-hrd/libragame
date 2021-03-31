function creatAdmin($firstname,$pseudo,$mail,$pass){
            $userManager = new\Projet\Models\UserManager();
            $name= $userManager->verify_name($firstname, $pseudo);

            $result= $name->fetch();
            if($result['pseudo'] !== $pseudo){
                $user=$userManager->creatAdmin($firstname,$pseudo,$mail,$pass);
                header("Location: index.php?action=meconnceter");
            }else{
                echo "Le pseudo existe déjà";
            }
        }