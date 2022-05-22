<?php


session_start();
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');


function connexion()
{
    $hostname = 'mldigimbdd.mysql.db';
    /*** mysql hostname ***/
    $username = 'mldigimbdd';
    /*** mysql username ***/
    $port = '3306';
    /*** mysql port ***/
    $password = '290403Mathis';
    /*** mysql password ***/
    $db = 'mldigimbdd';
    /*** mysql database ***/
    // Data Source Name
    $dsn = "mysql:host=$hostname;port=$port;dbname=$db";
    try {
        $bdd = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* echo "Connection réussie ! </br>"; */
    } catch (PDOException $e) {
        echo "Erreur de connection ! </br>";
        echo $e->getMessage();
    }
    return $bdd;
}
$bdd = connexion();

require_once(dirname(__DIR__) . '/include/core/verifCot.php');
require_once(dirname(__DIR__) . '/controllers/lastResa.php');


// retenir l'email de la personne connectée pendant 1 an
