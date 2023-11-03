<?php
require_once '../utils/common.php';
require_once '../utils/database.php';
?>


<?php
if (isset($_POST["envoie_msg"])) {
    $insertionDonnee = $pdo->prepare('INSERT INTO message (id_jeu, id_expediteur, message) 
            VALUES (:jeu, :expediteur, :message)');
    $insertionDonnee->execute([':jeu' => 1, ':expediteur' => $_SESSION['userId'], ':message' => $_POST['envoie_msg']]);
}
?>