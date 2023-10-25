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
function loginCheck(string $userMail, string $password): ?string
{
    $pdo = connectToDbAndGetPdo();
    $result = $pdo->query(sprintf('SELECT * FROM utilisateur WHERE utilisateur.mail = "%s"', $userMail))->fetch();
    if ($result->mot_de_passe === $password) {
        return $result->id;
    }
    return null;

}