<?php
function connectToDbAndGetPdo(): PDO
{
    $dbname = 'projet_flash';
    $host = 'localhost';
    $dsn = "mysql:dbname=$dbname;port=8888;host=$host;charset=utf8";
    $user = 'root';
    $pass = '';
    $driver_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $driver_options);
        return $pdo;
    } catch (PDOException $e) {
        echo 'La connexion à la base de données a échouée.';
    }
}
function loginCheck(string $userMail, string $password): ?object
{ 
    $password = hash('sha256', $_POST['password']);
    $pdo = connectToDbAndGetPdo();
    $pdoPrepare = $pdo->prepare('SELECT *, mot_de_passe as pwd FROM utilisateur WHERE utilisateur.mail = :mail');
    $pdoPrepare->execute([":mail" => $userMail]);
    $result = $pdoPrepare->fetch();
    if ($result->pwd == $password ) {
        return $result;
    }
    return null;
}


$pdo = connectToDbAndGetPdo();



function insertionUtilisateur($pdo, $email, $pseudo, $password) : void {
    $insertionDonnee = $pdo->prepare('INSERT INTO utilisateur (mail , mot_de_passe, pseudo) VALUES (:email, :password, :pseudo)');
    $insertionDonnee->execute([':email' => $email, ':password' => $password, ':pseudo' => $pseudo]);
}


function pseudoUse($pdo,$pseudo) : bool {
    $pseudoUsed = $pdo->prepare('SELECT pseudo FROM utilisateur WHERE pseudo = :pseudo');
    $pseudoUsed->execute([':pseudo' => $pseudo]);
    $pseudo_utilise = $pseudoUsed -> fetch();
    return isset($pseudo_utilise -> pseudo);
}

function emailUse($pdo,$email) : bool {
    $emailUsed = $pdo->prepare('SELECT mail FROM utilisateur WHERE mail = :email');
    $emailUsed->execute([':email' => $email]);
    $email_utilise = $emailUsed -> fetch();
    return isset($email_utilise -> mail);
}




function goodOldEmail($pdo, $emailVerif, $idUtilisateur): bool
{
    
    $pdoEmailExist= $pdo->prepare('SELECT mail FROM utilisateur WHERE id = :id');
    $pdoEmailExist->execute([':id' => $idUtilisateur]);
    $emailExist = $pdoEmailExist->fetch();
    return $emailExist->mail == $emailVerif;
}

function updateEmail($pdo, $newEmail, $idUtilisateur): void
{
    $pdoNewEmail = $pdo->prepare('UPDATE utilisateur SET mail = :email WHERE id = :id');
    $pdoNewEmail->execute([':email' => $newEmail, ':id' => $idUtilisateur]);
}


function goodOldPassword($pdo, $passwordVerif, $idUtilisateur): bool
{
    $passwordVerif = hash('sha256', $passwordVerif);
    $pdoPasswordExist= $pdo->prepare('SELECT mot_de_passe FROM utilisateur WHERE id = :id');
    $pdoPasswordExist->execute([':id' => $idUtilisateur]);
    $passwordExist = $pdoPasswordExist->fetch();
    return $passwordExist->mot_de_passe == $passwordVerif;
}

function updatePassword($pdo, $newPassword, $idUtilisateur): void
{
    $pdoNewPassword = $pdo->prepare('UPDATE utilisateur SET mot_de_passe = :new_password WHERE id = :id');
    $pdoNewPassword->execute([':new_password' => hash('sha256',$newPassword), ':id' => $idUtilisateur]);
}