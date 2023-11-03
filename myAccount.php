<!DOCTYPE html>
<html lang="en">

<?php
require_once 'utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';
require_once 'utils/database.php';


$uploadDir = SITE_ROOT.'/userFiles/';

$allowedExtensions = array('jpg','jpeg');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['upload']) && $_FILES['upload']['error'] === UPLOAD_ERR_OK){
        $file =$_FILES['upload'];
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (in_array(strtolower($fileExtension),$allowedExtensions)){
            $userId = $_SESSION['userId'] ;
            $fileName = $userId . '_profile.jpg';
            $filePath = $uploadDir . $fileName ;
            move_uploaded_file($_FILES['upload']['tmp_name'],$filePath);

            
        }
    }
}

?>



<section class="acc">

    <body>

        <div class="banner">
        <h1>Mon profil</h1>
        </div>
        <div class="logo-container">
        <div class="logo">

            <img src="<?=PROJECT_FOLDER .'userFiles/'. $_SESSION['userId'].'_profile.jpg'?>" alt="Image 6">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="upload" accept="image/jpg">
                <button type="submit" class="button"> upload </button>
                
            </form>
            </div>

        </div>




            <?php
                        if (isset($_POST['disconnect'])) {
                            session_destroy();
                            header("location:index.php");
                        }
            ?>

            <form method="POST" class ="deco">
                    <input class="appliquer" type="submit" name="disconnect" value="DÉCONNEXION">
            </form>




        <section class="d-flex">
            <div class="wrrapper">

                <form method="post">
                    <h2>Changer d'Email</h2>

                    <?php

                    $oldEmailError = $emailError = $passwordError = '';
                    $reussi_email = false;

                    if (isset ($_POST['email_form'])) :
                        if (
                            goodOldEmail($pdo, $_POST['old_email'], $_SESSION['userId'])
                            &&
                            goodOldPassword($pdo, $_POST['emailPassword'], $_SESSION['userId'])
                            &&
                            !emailUse($pdo, $_POST['email'])
                        ) :
                            echo '<p class="couleur_texte">CHANGEMENT DU MAIL REUSSI</p>';
                            $reussi_email = true;
                            updateEmail($pdo, $_POST['email'], $_SESSION['userId']);
                        endif;

                    endif;

                    if (!empty($_POST['old_email']) && !$reussi_email) :
                        if (!goodOldEmail($pdo, $_POST['old_email'], $_SESSION['userId'])) :
                            $oldEmailError = "L'Email ne correspond pas";
                        endif;
                    endif;

                    if (!empty($_POST['email']) && !$reussi_email) :
                        if (emailUse($pdo, $_POST['email'])) :
                            $emailError = "L'Email est deja utilisé";
                        endif;
                    endif;

                    if (!empty($_POST['emailPassword']) && !$reussi_email) :
                        if (!goodOldPassword($pdo, $_POST['emailPassword'], $_SESSION['userId'])) :
                            $passwordError = "Le mot de passe ne correspond pas";
                        endif;
                    endif;

                    ?>

                    <input type="hidden" name="email_form" >


                    <input class="en" type="email" placeholder="Ancien Email" name="old_email" required>
                    <span class="error"><?php echo $oldEmailError; ?> </span>


                    <input class="en" type="email" placeholder="Nouveau Email" name="email" required>
                    <span class="error"><?php echo $emailError; ?> </span>

                    <input class="en" type="password" placeholder="Mot De Passe" name="emailPassword" required>
                    <span class="error"><?php echo $passwordError; ?> </span>

                    <button type="submit" class="button">valider</button>
                </form>

            </div>










            <div>
                <form method="post">
                    <h2>Changer de mot de passe</h2>

                    <?php

                    $oldPasswordError = $newPasswordError = $confirm_passwordError =   ''; 
                    $reussi_password = false;
                        if (isset ($_POST['password_form'])) :
                            if (
                                goodOldPassword($pdo, $_POST['old_password'], $_SESSION['userId'])
                                &&
                                (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['new_password'])) 
                                &&
                                ($_POST['new_password'] == $_POST['confirm_password'])

                            ) :
                                echo '<p class="couleur_texte">CHANGEMENT DE MOT DE PASSE REUSSI</p>';
                                $reussi_password = true;
                                updatePassword($pdo, $_POST['new_password'], $_SESSION['userId']);
                    
                            endif;
                        endif;

                        if (!empty($_POST['old_password']) && !$reussi_password) :
                            if (!goodOldPassword($pdo, $_POST['old_password'], $_SESSION['userId'])) :
                                $oldPasswordError = "Le mot de passe ne correspond pas";

                            endif;
                        endif;

                        if (!empty($_POST['new_password']) && !$reussi_password) :
                            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['new_password'])) :
                                $newPasswordError = "Le mot de passe doit contenir au moins 8 caractères dont une minuscule, une majuscule, un chiffre et un caractère spécial.";

                            endif;
                        endif;

                        if (!empty($_POST['confirm_password']) && !$reussi_password) :
                            if ($_POST['new_password'] != $_POST['confirm_password']) :
                                $confirm_passwordError = 'Les mots de passe ne correspondent pas.';
                                           
                            endif;
                        endif;

                    ?>

                    <input type="hidden" name="password_form" >
                    <input class="en" type="password" placeholder="Ancien mot de passe" name="old_password" required>
                    <span class="error"><?php echo $oldPasswordError; ?> </span>

                    <input class="en" type="password" placeholder="Nouveau mot de passe" name="new_password" required>
                    <span class="error"><?php echo $newPasswordError; ?> </span>

                    <input class="en" type="password" placeholder="Confirmer le nouveau mot de passe" name="confirm_password" required>
                    <span class="error"><?php echo $confirm_passwordError; ?></span>

                    <button type="submit" class="button">valider</button>

                </form>
            </div>




        </section>
    </div>


        <?php
        require_once SITE_ROOT . 'partials/footer.php';
        ?>



    </body>
</section>

</html>