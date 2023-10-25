<!DOCTYPE html>
<html lang="en">


<?php 
require_once 'utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';
?>


<section class="log">
    <body>



        <div class="banner">
            <h1>Connexion</h1>
        </div>
        <div class="login">
            <form>
                <input class="" type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Mot De Passe" name="password">
                <button type="submit" class="button">connexion</button>
                <p> Si vous avez un compte :<a href="<?= PROJECT_FOLDER ?>register.php"> cliquez ici</a> </p>
            </form>
        </div>



<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>

    </body>
</section>
</html>