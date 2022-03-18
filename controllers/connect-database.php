<?php


session_start();



function connexion()
{
    $hostname = 'localhost';
    /*** mysql hostname ***/
    $username = 'root';
    /*** mysql username ***/
    $port = '3306';
    /*** mysql port ***/
    $password = '';
    /*** mysql password ***/
    $db = 'neotica';
    /*** mysql database ***/
    // Data Source Name
    $dsn = "mysql:host=$hostname;port=$port;dbname=$db";
    try {
        $bdd = new PDO($dsn, $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection réussie ! </br>";
    } catch (PDOException $e) {
        echo "Erreur de connection ! </br>";
        echo $e->getMessage();
    }
    return $bdd;
}
$bdd = connexion();


// retenir l'email de la personne connectée pendant 1 an
setcookie(
    'LOGGED_USER',
    'utilisateur@exemple.com',
    [
        'expires' => time() + 365 * 24 * 3600,
        /* 'secure' => true,
        'httponly' => true, */
    ]
);
