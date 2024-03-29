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
    $sqlIdQuery = "select adherent.id from adherent";
    $sqlPasswordQuery = "select adherent.mot_de_passe from adherent";
    $sqlDroitQuery = "select adherent.droit from adherent";

    // Requêtes pour stocker les noms et prénoms de l'$ID rentré
    $sqlNomQuery = "SELECT adherent.nom_adh FROM adherent WHERE adherent.id = '$id'";
    $sqlPrenomQuery = "SELECT adherent.pre_adh FROM adherent WHERE adherent.id = '$id'";



    // exec SQL adherent.id QUERY
    $sqlIdResult = $bdd->prepare($sqlIdQuery);
    $sqlIdResult->execute();
    // boucle de connexion qui rentre les valeurs retournées dans un tableau
    while ($idResult = $sqlIdResult->fetch()) {
        $IdResultArray[] = $idResult[0];
    }


    // exec SQL adherent.mot_de_passe QUERY
    $sqlPasswordResult = $bdd->prepare($sqlPasswordQuery);
    $sqlPasswordResult->execute();
    // boucle de connexion qui rentre les valeurs retournées dans un tableau
    while ($passwordResult = $sqlPasswordResult->fetch()) {
        $passwordResultArray[] = $passwordResult[0];
    }

    // exec SQL adherent.droit QUERY
    $sqlDroitResult = $bdd->prepare($sqlDroitQuery);
    $sqlDroitResult->execute();
    // boucle de connexion qui rentre les valeurs retournées dans un tableau
    while ($droitResult = $sqlDroitResult->fetch()) {
        $droitResultArray[] = $droitResult[0];
    }

    if (in_array($id, $IdResultArray)) {
        // exec SQL adherent.nom_adh QUERY
        $sqlNomResult = $bdd->prepare($sqlNomQuery);
        $sqlNomResult->execute();
        // boucle de connexion qui rentre les valeurs retournées dans un tableau
        $nomResult =  $sqlNomResult->fetch(PDO::FETCH_NAMED);
        $_SESSION['nom'] = $nomResult['nom_adh'];

        // exec SQL adherent.nom_adh QUERY
        $sqlPrenomResult = $bdd->prepare($sqlPrenomQuery);
        $sqlPrenomResult->execute();
        // boucle de connexion qui rentre les valeurs retournées dans un tableau
        $prenomResult =  $sqlPrenomResult->fetch(PDO::FETCH_NAMED);
        $_SESSION['prenom'] = $prenomResult['pre_adh'];
        $_SESSION['id'] = $id;

        setcookie('nom', $_SESSION['prenom']);
    }



    // Retourne la position dans le tableau associé de la valeur recherchée. 
    // ID => valeur dans le tableau, PASSWORD => valeur dans le tableau.
    $idKey = array_search($id, $IdResultArray);
    $passwordKey = array_search($password, $passwordResultArray);


    // Rentre dans un tableau les infos de la session
    $sessInfo = array('id' => $id, 'password' => $password);

    //var_dump pour le debugging
    //var_dump($sessInfo, $IdResultArray, $passwordResultArray, $droitResultArray, $nomResult, $_SESSION['nom'], $idKey, $passwordKey);



    if ($droitResultArray[$idKey] == 1) {
        $droitAdh = true;
        $droitPlagiste = false;
        $droitAdmin = false;
    } elseif ($droitResultArray[$idKey] == 2) {
        $droitAdh = false;
        $droitPlagiste = true;
        $droitAdmin = false;
    } elseif ($droitResultArray[$idKey] == 3) {
        $droitAdh = false;
        $droitPlagiste = false;
        $droitAdmin = true;
    } else {
        $droitAdh = false;
        $droitPlagiste = false;
        $droitAdmin = false;
    }

    // Test si :
    // Le nom d'utilisateur ET
    // Le mot de passe sont dans leur tableau ET
    // Si leur position dans leur tableau respectif est la même.
    if (
        in_array($id, $IdResultArray) &&
        in_array($password, $passwordResultArray) &&
        $idKey == $passwordKey
    ) {
        if ($droitAdmin == true) {
            $_SESSION["role"] = 'admin'; // si le test est juste, ouvre la session 'admin'
            echo '
            <pre> Le nom de votre session est ' . $_SESSION["id"] . ' et vous êtes administrateur</pre>';
            echo '
            <pre> CONNEXION REUSSIE </pre>';
            header('Location: http://bdd.gestion/SAE/index.php');
            exit();
        } elseif ($droitAdh == true) {
            $_SESSION["role"] = 'adherent'; // si le test est juste, ouvre la session 'adherent'
            echo '
            <pre> Le nom de votre session est ' . $_SESSION["id"] . ' et vous êtes utilisateur </pre>';
            echo '
            <pre> CONNEXION REUSSIE </pre>';
            header('Location: http://bdd.gestion/SAE/index.php');
            exit();
        } elseif ($droitPlagiste == true) {
            $_SESSION["role"] = 'plagiste'; // si le test est juste, ouvre la session 'plagiste'
            echo '
            <pre> Le nom de votre session est ' . $_SESSION["id"] . ' et vous êtes utilisateur </pre>';
            echo '
            <pre> CONNEXION REUSSIE </pre>';
            header('Location: http://bdd.gestion/SAE/index.php');
            exit();
        }
    } else {
        echo '<br />';
        echo
        '<div class="id-false"> Oups ! identifiant incorrect</div> ';
    }
}
