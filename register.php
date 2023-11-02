<!DOCTYPE html>
<html lang="en">


<?php
require_once 'utils/common.php';
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'partials/header.php';
require_once 'utils/database.php';

?>

<?php


$emailError = $pseudoError = $passwordError = $confirm_passwordError = '';
$registrationError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = "L'adresse e-mail n'est pas valide.";
    }

    if (!preg_match('/.{4,}$/', $_POST['pseudo'])) {
        $pseudoError = 'Le pseudo doit contenir au moins 4 caractères.';
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['password'])) {
        $passwordError = 'Le mot de passe doit contenir au moins 8 caractères dont une minuscule, une majuscule, un chiffre et un caractère spécial.';
    }

    if ($_POST['password'] != $_POST['confirm_password']) {
        $confirm_passwordError = 'Les mots de passe ne correspondent pas.';
    }

    if (pseudoUse($pdo, $_POST['pseudo'])) {
        $pseudoError = 'Le pseudo est deja utilisé';
    }

    if (emailUse($pdo, $_POST['email'])) {
        $emailError = "L'Email est deja utilisé";
    }


    if ($emailError == '' && $pseudoError == '' && $passwordError == '' && $confirm_passwordError == '') {
        $_POST['password'] = hash('sha256', $_POST['password']);
        insertionUtilisateur($pdo, $_POST['email'], $_POST['pseudo'], $_POST['password']);

        header('Location: login.php');
    } else{
      
        $registrationError = "Erreur lors de l'inscription. Veuillez corriger les erreurs ci-dessus.";
    }
}


?>






<section class="reg">

    <body>
        <div class="banner">
            <h1>Inscription</h1>
        </div>



        <div class="login">
            <form method="post">

                <input type="email" placeholder="Email" name="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <span class="error"><?php echo $emailError; ?> </span>

                <input placeholder="Pseudo" name="pseudo" minlength=4 maxlength=25 required value="<?php echo isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; ?>">
                <span class="error"><?php echo $pseudoError; ?></span>

                <input type="password" placeholder="Mot De Passe" id = "password" name="password" required value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" onkeyup="passwordCheck()">
                <span class="error"><?php echo $passwordError; ?></span>
                
                <div>
                    <span id="easy"></span>
                    <span id="medium"></span>
                    <span id="difficult"></span>
                    <span id="hardDifficult"></span>
                </div>

                <input type="password" placeholder="Comfirmez le mot De Passe" name="confirm_password" required value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''; ?>">
                <span class="error"><?php echo $confirm_passwordError; ?></span>

                <button type="submit" class="button">Inscription</button>

                <p> Si vous avez un compte :<a href="<?= PROJECT_FOLDER ?>login.php"> cliquez ici</a> </p>
            </form>
        </div>










        <?php
        require_once SITE_ROOT . 'partials/footer.php';
        ?>
<script>
    function passwordCheck() {
    var password = document.getElementById("password").value;
    var easy = document.getElementById("easy");
    var medium = document.getElementById("medium");
    var difficult = document.getElementById("difficult");
    var hardDifficult = document.getElementById("hardDifficult");
  
    var strength = 0;
    var tips = "";
  
    if (password.length < 8) {
      tips += "Mot de passe pas assez long.";
    } else {
      strength += 1;
    }
  
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
      strength += 1;
    } else {
      tips += "Une majuscule et une minuscule ";
    }
  
    if (password.match(/\d/)) {
      strength += 1;
    } else {
      tips += "Au moins un nombre. ";
    }
  
    if (password.match(/[^a-zA-Z\d]/)) {
      strength += 1;
    } else {
      tips += "Inclus un charactère spécial. ";
    }
  
    if 
    (strength === 3) {
      document.getElementById("medium").innerHTML='';
      document.getElementById("easy").innerHTML='';
      document.getElementById("hardDifficult").innerHTML='';
      difficult.textContent = "Mot de passe difficile " + tips;
      difficult.style.color = "orange";
  } else if 
  (strength === 2) {
      document.getElementById("easy").innerHTML='';
      document.getElementById("hardDifficult").innerHTML='';
      document.getElementById("difficult").innerHTML='';
      medium.textContent = "Mot de passe moyen. " + tips;
      medium.style.color = "yellow";
    } else if (strength < 2) {
      document.getElementById("hardDifficult").innerHTML='';
      document.getElementById("difficult").innerHTML='';
      document.getElementById("medium").innerHTML='';
      easy.textContent = "Mot de passe facile " + tips;
      easy.style.color = "red";
    } else {
      document.getElementById("difficult").innerHTML='';
      document.getElementById("medium").innerHTML='';
      document.getElementById("easy").innerHTML='';
      hardDifficult.textContent = "Mot de passe très difficile. " + tips;
      hardDifficult.style.color = "green";
    }
  }


</script>
    </body>
</section>

</html>