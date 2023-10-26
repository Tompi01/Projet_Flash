<!DOCTYPE html>
<html lang="en">


<?php
require_once 'utils/common.php';
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'partials/header.php';
?>



<section class="con">

    <body>


        <div class="banner">
            <h1>Nous Contacter</h1>
        </div>
        <section class="d-flex">
            <div class="back">
                <img src="<?= PROJECT_FOLDER ?>assets/tel.png" alt="tel" class="image2">
                <h3>06 05 04 03 02</h3>
            </div>
            <div class="back">
                <img src="<?= PROJECT_FOLDER ?>assets/mail.png" alt="mail" class="image2">
                <h3>support@powerofmemory.com</h3>
            </div>
            <div class="back">
                <img src="<?= PROJECT_FOLDER ?>assets/lieu.png" alt="lieu" class="image2">
                <h3>Paris</h3>
            </div>
        </section>





        <div class="contact">
            <form action="contact.php" method="post">
                <input type="text" placeholder="Nom" name="name">
                <input type="email" placeholder="Email" name="email" class="email">
                <br>
                <input type="text" placeholder="Sujet" name="subject" class="sujet">
                <br>
                <textarea name="message" placeholder="Message" id="" cols="30" rows="10" class="message1"></textarea>
                <br>
                <button type="submit" class="button">Envoyer</button>
                <br>
            </form>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $from = $_POST["email"];

                $headers = "From: $from";

                if (mail(ADMIN_MAIL, $subject, $message, $headers)) {
                    echo "Email envoyé avec succès !";
                } else {
                    echo "Echec de l'envoie de l'email.";
                }
            } else {
                echo "Requète invalide.";
            }
            ?>

        </div>










        <?php
        require_once SITE_ROOT . 'partials/footer.php';
        ?>

    </body>
</section>

</html>