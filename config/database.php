<?php
$host = 'localhost'; //l'adresse du serveur (ici en local via XAMPP).
$dbname = 'driveeasy'; //le nom de la base de données.
$user = 'root';
$pass = ''; //identifiants MySQL (root sans mot de passe = config XAMPP par défaut).

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    ); //PDO (PHP Data Objects) est la façon moderne de se connecter à MySQL en PHP.
        //On crée un objet $pdo en lui passant : le type de base (mysql), l'hôte, le nom de BDD, le charset (utf8 pour les accents), puis le login et le mot de passe.
        //Cet objet $pdo sera utilisé dans tous les autres fichiers PHP.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connexion impossible : ' . $e->getMessage());
}
?>