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
                            $sqlUserNameQuery = "select user.name from user";
                            $sqlPasswordQuery = "select user.password from user";

                            // exec SQL USER.NAME QUERY
                            $sqlResult = $bdd->prepare($sqlUserNameQuery);
                            $sqlResult->execute();
                            $valueNumber = $sqlResult->rowCount();

                            // exec SQL USER.PASSWORD QUERY
                            $sqlPasswordResult = $bdd->prepare($sqlPasswordQuery);
                            $sqlPasswordResult->execute();
                            $valueNumber = $sqlPasswordResult->rowCount();

                            // différents tests
                            echo "nom d'utilisateur : " . $username . '<br>' . "mot de passe : " . $password . '<br>';

                            // boucle de connexion qui teste pour chaque user.name retourné
                            // si le bon est présent

                            while ($result = $sqlResult->fetch()) {
                                $resultArray[] = $result[0];
                            }

                            while ($passwordResult = $sqlPasswordResult->fetch()) {
                                $passwordResultArray[] = $passwordResult[0];
                            }


                            $userKey = array_search($username, $resultArray);
                            $passwordKey = array_search($password, $passwordResultArray);
                            $sessInfo = array('id' => $username, 'password' => $password);

                            var_dump($resultArray, $passwordResultArray, $userKey, $passwordKey);

                            if (
                                in_array($username, $resultArray) &&
                                in_array($password, $passwordResultArray) &&
                                $userKey == $passwordKey
                            ) {
                                $_SESSION["userSession"] = $username;
                                echo $_SESSION["userSession"];
                                echo '<pre> CONNEXION REUSSIE </pre>';
                            } else {
                                echo
                                '<h1> identifiant incorrect </h1> ';
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