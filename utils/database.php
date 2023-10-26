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