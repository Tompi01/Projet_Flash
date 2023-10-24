<!DOCTYPE html>
<html lang="en">


<?php 
require_once 'utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';
?>


<section class="reg">
    <body>


        <div class="banner">
            <h1>Inscription</h1>
        </div>
        <div class="login">
            <form>
                <input type="email" placeholder="Email" name="email">
                <input type="pseudo" placeholder="Pseudo" name="pseudo">
                <input type="password" placeholder="Mot De Passe" name="password">
                <input type="confirm_password" placeholder="Comfirmez le mot De Passe" name="confirm_password">
                <button type="submit" class="button">Inscription</button>
                <p> Si vous avez un compte :<a href="login.html"> cliquer ici</a> </p>
            </form>
        </div>




<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>

    </body>
</section>
</html>