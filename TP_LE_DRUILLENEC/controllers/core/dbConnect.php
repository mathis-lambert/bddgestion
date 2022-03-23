<?php

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
    $db = 'monsite';
    /*** mysql database ***/
    // Data Source Name
    $dsn = "mysql:host=$hostname;port=$port;dbname=$db";
    try {
        $bdd = new PDO($dsn, $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p class='successfull'> Connection réussie ! </br>";
        $bdd->query('SET NAMES utf8');
    } catch (PDOException $e) {
        echo "Erreur de connection ! </br>";
        echo $e->getMessage();
    }
    return $bdd;
}
$bdd = connexion();
