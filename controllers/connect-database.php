<?php
function Connexion()
{
    $hostname = 'localhost';
    /*** mysql hostname ***/
    $username = 'root';
    /*** mysql username ***/
    $password = '';
    /*** mysql password ***/
    $db = 'monsite';
    /*** mysql database ***/
    // Data Source Name
    $dsn = "mysql:host=$hostname;dbname=$db";
    try {
        $bdd = new PDO($dsn, $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection réussie ! </br>";
    } catch (PDOException $e) {
        echo "Erreur de connection ! </br>";
        echo $e->getMessage();
    }
}
$db = connexion();
