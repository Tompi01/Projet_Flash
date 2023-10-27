<!DOCTYPE html>
<html lang="en">

<?php 
require_once 'utils/common.php';
require_once SITE_ROOT. 'partials/head.php';
require_once SITE_ROOT. 'partials/header.php';



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
//$userProfileImage = 'userFiles/123.jpg';
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
    </div>


<?php 
require_once SITE_ROOT. 'partials/footer.php';
?>



        </body>
</section>
</html>