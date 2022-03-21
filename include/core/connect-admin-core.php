<?php

if (!empty($_POST)) {

    // associer les entrées du formulaire aux variables
    $username = $_POST['id'];
    $password = $_POST['passwrd'];

    // requête mySQL
    $sqlUserNameQuery = "select user.name from user";
    $sqlPasswordQuery = "select user.password from user";
    $sqlIsAdminQuery = "select user.isAdmin from user";

    // exec SQL USER.NAME QUERY
    $sqlResult = $bdd->prepare($sqlUserNameQuery);
    $sqlResult->execute();

    // exec SQL USER.PASSWORD QUERY
    $sqlPasswordResult = $bdd->prepare($sqlPasswordQuery);
    $sqlPasswordResult->execute();

    // exec SQL USER.PASSWORD QUERY
    $sqlIsAdminResult = $bdd->prepare($sqlIsAdminQuery);
    $sqlIsAdminResult->execute();

    // différents tests
    echo "
<pre>nom d'utilisateur : " . $username . '<br>' . "mot de passe : " . $password . '</pre> <br>';

    // boucle de connexion qui rentre les valeurs retournées dans un tableau
    while ($result = $sqlResult->fetch()) {
        $userResultArray[] = $result[0];
    }
    while ($passwordResult = $sqlPasswordResult->fetch()) {
        $passwordResultArray[] = $passwordResult[0];
    }
    while ($isAdminResult = $sqlIsAdminResult->fetch()) {
        $isAdminResultArray[] = $isAdminResult[0];
    }

    // Retourne la position dans le tableau associé de la valeur recherchée. X => valeur, Y => valeur.
    $userKey = array_search($username, $userResultArray);
    $passwordKey = array_search($password, $passwordResultArray);


    // Rentre dans un tableau les infos de la session
    $sessInfo = array('id' => $username, 'password' => $password);

    //var_dump($userResultArray, $passwordResultArray, $isAdminResultArray, $userKey, $passwordKey, $isAdminResult);


    $isAdminResult = $isAdminResultArray[$userKey];

    // Test si :
    // Le nom d'utilisateur ET
    // Le mot de passe sont dans leur tableau ET
    // Si leur position dans leur tableau respectif est la même.
    if ($isAdminResult == true) {
        if (
            in_array($username, $userResultArray) &&
            in_array($password, $passwordResultArray) &&
            $userKey == $passwordKey
        ) {
            $_SESSION["adminSession"] = $username; // si le test est juste, ouvre la session 'userSession'
            echo '
    <pre> Le nom de votre session est ' . $_SESSION["adminSession"] . ' et vous êtes administrateur</pre>';
            echo '
    <pre> CONNEXION REUSSIE </pre>';
        } else {
            echo
            '
    <pre> identifiant incorrect </pre> ';
        }
    } else {
        echo "<pre>" . "vous n'êtes pas administrateur veuillez vous connecter en tant qu'adhérent." . '</pre>';
        session_destroy();
    }
}
