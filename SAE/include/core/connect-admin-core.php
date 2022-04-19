<?php
if (!empty($_POST)) {

    // associer les entrées du formulaire aux variables
    $id = $_POST['id'];
    $password = $_POST['passwrd'];

    // requête mySQL
    $sqlIdQuery = "select adherent.id from adherent";
    $sqlPasswordQuery = "select adherent.mot_de_passe from adherent";
    $sqlDroitQuery = "select adherent.droit from adherent";

    // exec SQL USER.NAME QUERY
    $sqlIdResult = $bdd->prepare($sqlIdQuery);
    $sqlIdResult->execute();

    // exec SQL USER.PASSWORD QUERY
    $sqlPasswordResult = $bdd->prepare($sqlPasswordQuery);
    $sqlPasswordResult->execute();

    // exec SQL USER.PASSWORD QUERY
    $sqlDroitResult = $bdd->prepare($sqlDroitQuery);
    $sqlDroitResult->execute();

    // différents tests
    echo "
<pre>nom d'utilisateur : " . $id . '<br>' . "mot de passe : " . $password . '</pre> <br>';

    // boucle de connexion qui rentre les valeurs retournées dans un tableau
    while ($idResult = $sqlIdResult->fetch()) {
        $IdResultArray[] = $idResult[0];
    }
    while ($passwordResult = $sqlPasswordResult->fetch()) {
        $passwordResultArray[] = $passwordResult[0];
    }
    while ($droitResult = $sqlDroitResult->fetch()) {
        $droitResultArray[] = $droitResult[0];
    }

    // Retourne la position dans le tableau associé de la valeur recherchée. X => valeur, Y => valeur.
    $userKey = array_search($id, $IdResultArray);
    $passwordKey = array_search($password, $passwordResultArray);


    // Session info avancée (nom, prénom)
    $sqlNomQuery = "SELECT adherent.nom_adh FROM adherent WHERE adherent.id = '$IdResultArray[$userKey]'";
    $sqlNomResult = $bdd->prepare($sqlNomQuery);
    $sqlNomResult->execute();

    $nomResult = $sqlNomResult->fetch();
    // ----------------------------------


    // Rentre dans un tableau les infos de la session
    $sessInfo = array('id' => $id, 'password' => $password, 'nom' => $nomResult);

    var_dump($IdResultArray, $passwordResultArray, $droitResultArray, $userKey, $passwordKey, $sessInfo);


    // test les droit de la tentative de connexion
    if ($droitResultArray[$userKey] == 1) {
        $droitAdh = true;
        $droitPlagiste = false;
        $droitAdmin = false;
    } elseif ($droitResultArray[$userKey] == 2) {
        $droitAdh = false;
        $droitPlagiste = true;
        $droitAdmin = false;
    } elseif ($droitResultArray[$userKey] == 3) {
        $droitAdh = false;
        $droitPlagiste = false;
        $droitAdmin = true;
    } else {
        $droitAdh = true;
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
        $userKey == $passwordKey &&
        $droitAdmin == true
    ) {
        $_SESSION["adminSession"] = $id; // si le test est juste, ouvre la session 'adminSession'
        echo '
        <pre> Le nom de votre session est ' . $_SESSION["adminSession"] . ' et vous êtes administrateur</pre>';
        echo '
        <pre> CONNEXION REUSSIE </pre>';
        /* header('Location: http://bdd.gestion/SAE/index.php');
            exit(); */
    } else {
        echo "<pre>" . "vous n'êtes pas administrateur veuillez vous connecter en tant qu'adhérent." . '</pre>';
        session_destroy();
    }
}
