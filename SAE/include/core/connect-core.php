<?php
if (!empty($_POST)) {
    if (!empty($_SESSION)) {
        session_destroy();
    }

    // associer les entrées du formulaire aux variables
    $id = $_POST['id'];
    $password = md5($_POST['passwrd']);

    // requête mySQL pour selectionner tous les ID, PASSWORD et DROIT pour 
    // constituer un tableau en PHP et faciliter les traitements
    $sqlIdQuery = "SELECT adherent.id, adherent.mot_de_passe, adherent.droit FROM adherent WHERE adherent.id = '$id'";

    // exec SQL adherent.id QUERY
    $sqlIdResult = $bdd->prepare($sqlIdQuery);
    $sqlIdResult->execute();
    // Stocke dans un tableau ce qui est renvoyé par la requête
    $idResult = $sqlIdResult->fetch(PDO::FETCH_ASSOC);

    // Requêtes pour stocker les noms et prénoms de l'$ID rentré
    $sqlNomQuery = "SELECT adherent.nom_adh FROM adherent WHERE adherent.id = '$id'";
    $sqlNomResult = $bdd->prepare($sqlNomQuery);
    $sqlNomResult->execute();
    $nomResult =  $sqlNomResult->fetch(PDO::FETCH_ASSOC);

    $sqlPrenomQuery = "SELECT adherent.pre_adh FROM adherent WHERE adherent.id = '$id'";
    $sqlPrenomResult = $bdd->prepare($sqlPrenomQuery);
    $sqlPrenomResult->execute();
    $prenomResult =  $sqlPrenomResult->fetch(PDO::FETCH_ASSOC);

    // exec SQL adherent.nom_adh QUERY
    // boucle de connexion qui rentre les valeurs retournées dans un tableau


    var_dump($idResult, $nomResult, $prenomResult);


    if ($idResult != false) {
        if ($password == $idResult['mot_de_passe']) {
            if ($idResult['droit'] == 1) {
                $_SESSION['id'] = $id;
                $_SESSION['role'] = 'adherent';
                $_SESSION['nom'] = $nomResult['nom_adh'];
                $_SESSION['prenom'] = $prenomResult['pre_adh'];
            } elseif ($idResult['droit'] == 2) {
                $_SESSION['id'] = $id;
                $_SESSION['role'] = 'plagiste';
                $_SESSION['nom'] = $nomResult['nom_adh'];
                $_SESSION['prenom'] = $prenomResult['pre_adh'];
            } elseif ($idResult['droit'] == 3) {
                $_SESSION['id'] = $id;
                $_SESSION['role'] = 'admin';
                $_SESSION['nom'] = $nomResult['nom_adh'];
                $_SESSION['prenom'] = $prenomResult['pre_adh'];
            }
        } else {
            echo '<br />';
            echo '<div class="id-false"> Oups ! Le mot de passe est incorrect veuillez réessayer !</div> ';
        }
    } else {
        echo '<br />';
        echo "<div class='id-false'> Oups ! Cet identifiant n'existe pas !</div> ";
    }
}
