<?php
require_once('connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'une base de données</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="../assets/style/style.css">

    <!-- CSS OTHERS -->


</head>

<body class="white">

    <!-- ###### HEADER ###### -->
    <?php
    include_once('../include/header.php');
    ?>
    <!---->

    <main>
        <!-- ###### SIDENAV ###### -->
        <?php
        include_once('../include/sidenav.php');
        ?>
        <!---->



        <div class="scale-container">
            <div class="container">

                <h1>Se connecter</h1>

                <div class="sp-150"></div>

                <div class="d-flex row justify-center text-center">
                    <div class="col-4 connect-card">
                        <h1 class="text-center">Connexion</h1>
                        <br><br>
                        <form action="connect-normal.php" method="POST" class="d-flex align-center column">
                            <label for="id">Identifiant</label>
                            <input type="text" name="id" id="id" placeholder="Identifiant" required>

                            <label for="passwrd">Mot de passe</label>
                            <input type="password" name="passwrd" id="passwrd" placeholder="Mot de passe" required>
                            <br>
                            <button type="submit">Envoyer</button>
                        </form>

                        <?php

                        if (!empty($_POST)) {

                            // associer les entrées du formulaire aux variables
                            $username = $_POST['id'];
                            $password = $_POST['passwrd'];

                            // requête mySQL
                            $sqlQuery = "select user.name from user";

                            // exec SQL QUERY
                            $sqlResult = $bdd->prepare($sqlQuery);
                            $sqlResult->execute();
                            $valueNumber = $sqlResult->rowCount();

                            // association du resultat de la requete à une variable
                            /* $result = $sqlResult->fetch(); */

                            // différents tests

                            echo "nom d'utilisateur : " . $username . '<br>' . "mot de passe : " . $password . '<br>';

                            // boucle de connexion qui teste pour chaque user.name retourné
                            // si le bon est présent
                            /* while ($result = $sqlResult->fetch()) {
                                for ($i = 0; $i < $valueNumber; $i++) {
                                    echo 'i = ' . $i . ' ' . $result[0] . '<br>';
                                    echo 'i = ' . $i . ' ' . $result[$i] . '<br>';
                                    if ($result[$i] === $username) {
                                        echo '<h1> CONNEXION REUSSIE </h1>';
                                    } else {
                                        echo 'identifiant incorrect';
                                    }
                                }
                            } */
                            $resultArray = array();
                            while ($result = $sqlResult->fetch()) {
                                $resultArray[] = $result[0];
                            }
                            if (!in_array($username, $resultArray)) {
                                echo
                                '<h1> identifiant incorrect </h1> ';
                            } else {
                                echo '<pre> CONNEXION REUSSIE </pre>';
                            }
                        }
                        ?>

                        <br>
                        <a href="passwrd-recovery.php">Mot de passe oublié</a>

                    </div>
                </div>

            </div>
        </div>
    </main>


    <!-- ###### FOOTER ###### -->
    <?php
    include_once('../include/footer.php');
    ?>
    <!---->
</body>

</html>