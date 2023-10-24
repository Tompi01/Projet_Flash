<!DOCTYPE html>
<html lang="en">

<?php 
require_once 'utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';
?>

<section class="acc">
    <body>


        <div class="banner">
            <h1>Mon profil</h1>
        </div>
        <section class="d-flex">
            <div class="wrrapper">
                <form>
                    <h2>Changer d'Email</h2>
                    <input class="en" type="email" placeholder="Ancien Email" name="email">
                    <input class="en" type="email" placeholder="Nouveau Email" name="email">
                    <input class="en" type="password" placeholder="Mot De Passe" name="password">
                    <button type="submit" class="button">valider</button>
                </form>

            </div>
            <div>
                <form>
                    <h2>Changer de mot de passe</h2>
                    <input class="en" type="password" placeholder="Ancien mot de passe" name="email">
                    <input class="en" type="password" placeholder="Nouveau mot de passe" name="email">
                    <input class="en" type="password" placeholder="Confirmer le nouveau mot de passe" name="password">
                    <button type="submit" class="button">valider</button>
                </form>
            </div>
        </section>


<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>



        </body>
</section>
</html>