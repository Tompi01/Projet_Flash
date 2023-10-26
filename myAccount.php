<!DOCTYPE html>
<html lang="en">

<?php
require_once 'utils/common.php';
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'partials/header.php';
require_once 'utils/database.php';
?>



<?php

$emailError = $newEmailError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (isset($_POST['email']) && isset($_POST['old_email'])) {
        $email = $_POST['email'];
        $oldEmail = $_POST['old_email'];

        if (!emailUse($pdo, $oldEmail)) {
            $emailError = "Aucun compte n'est associé à l'ancien Email";
        }
    }

    if (emailUse($pdo, $email)) {
        $newEmailError = "Deja un compte posséde cette Email";
    }
}


?>



<section class="acc">

    <body>


        <div class="banner">
            <h1>Mon profil</h1>
        </div>

        <section class="d-flex">
            <div class="wrrapper">
                <form method="post">
                    <h2>Changer d'Email</h2>

                    <input class="en" type="email" placeholder="Ancien Email" name="old_email" required>
                    <span class="error"><?php echo $emailError; ?> </span>


                    <input class="en" type="email" placeholder="Nouveau Email" name="email" required>
                    <span class="error"><?php echo $newEmailError; ?> </span>



                    <input class="en" type="password" placeholder="Mot De Passe" name="password" required>
                    <button type="submit" class="button">valider</button>
                </form>

            </div>
            <div>
                <form method="post">
                    <h2>Changer de mot de passe</h2>
                    <input class="en" type="password" placeholder="Ancien mot de passe" name="email" required>
                    <input class="en" type="password" placeholder="Nouveau mot de passe" name="email" required>
                    <input class="en" type="password" placeholder="Confirmer le nouveau mot de passe" name="password" required>
                    <button type="submit" class="button">valider</button>
                </form>
            </div>
        </section>


        <?php
        require_once SITE_ROOT . 'partials/footer.php';
        ?>



    </body>
</section>

</html>