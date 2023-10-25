<!DOCTYPE html>
<html lang="en">
<?php
require_once 'utils/common.php';
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'partials/header.php';
require_once 'utils/database.php';
?>


<section class="log">
    <body>



        <div class="banner">
            <h1>Connexion</h1>
        </div>
        <?php 
            require_once 'utils/common.php';
            require_once 'utils/database.php';

            if (isset($_POST['email']) && isset($_POST['password'])) 
                $userId = loginCheck($_POST['email'], $_POST['password']);
                if ($userId) {  

                    header('Location: games/memory/index1.php');
                } else {
                    echo "Identifiants incorrects. Veuillez réessayer.";
                }

        ?>
        <div class="login">
            <form method="POST" action="login.php">
                <input class="" type="email" placeholder="email" name="email">
                <input type="password" placeholder="Mot De Passe" name="password">
                <button type="submit" class="button">connexion</button>
                <p> Si vous n'avez pas de compte :<a href="register.php"> cliquer ici</a> </p>
            </form>
        </div>



<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>

    </body>
</section>
</html>