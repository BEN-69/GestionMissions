<?php
//Connexion à la base de données
$host = "127.0.0.1";
$login = "root";
$password = "root";
$dbname = "missions_ingenieurs";

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $login, $password, $pdo_options);
    $bdd -> exec("set names utf8");

    // echo "<strong>Connexion réussie au serveur de bases de données</strong> <br/>";
} catch (Exception $e) {
    die('Erreur : ' . $e -> getMessage());
} catch(PDOException $e) {
    echo "Connexion impossible au serveur de bases de données <br/>";
    die('Erreur : ' . $e -> getMessage());
}
?>