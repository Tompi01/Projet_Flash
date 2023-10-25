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
        <div class="login">
            <form method="POST" action="login.php">
                <input class="" type="email" placeholder="email" name="email">
                <input type="password" placeholder="Mot De Passe" name="password">
                <button type="submit" class="button">connexion</button>
                <p> Si vous avez un compte :<a href="<?= PROJECT_FOLDER ?>register.php"> cliquez ici</a> </p>
       
            <?php 
            require_once 'utils/common.php';
            require_once 'utils/database.php';


            if (isset($_POST['email']) && isset($_POST['password'])) 
            {
                $userId = loginCheck($_POST['email'], $_POST['password']);
                if (!$userId) {  ?>
                    <p class="warning">Identifiants incorrects. Veuillez réessayer.</p>
                    <?php
                } else {
                    header('Location: games/memory/index1.php');
                }
            }

        ?>
         </div>

        



<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>

    </body>
</section>
</html>