<?php
require_once('../controllers/connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOTICA | Gestion des données</title>

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
        <?php
        include_once('../include/sidenav.php')
        ?>

        <div class="scale-container">
            <div class="container">
                <div class="d-flex edit-options">
                    <div class="add">
                        <button id="add">Ajouter</button>
                    </div>
                    <div class="update">
                        <button id="update">Modifier</button>
                    </div>
                    <div class="delete">
                        <button id="delete">Supprimer</button>
                    </div>
                </div>
                <div class="add-modal" id="add-modal">
                    <div class="bg-modal" id="add-bg-modal"></div>
                    <div class="add-box">
                        <form action="ajouterInfo.php" method="post" required>
                            <label for="nom">nom</label>
                            <input type="text" name="nom" id="nom" required>
                            <br>
                            <label for="firstname"> prénom</label>
                            <input type="text" name="firstname" id="firstname" required>
                            <br>
                            <label for="age">age</label>
                            <input type="number" name="age" id="age" required>
                            <br>
                            <label for="city">ville</label>
                            <input type="text" name="city" id="city" required>
                            <br>
                            <label for="adresse">adresse</label>
                            <input type="text" name="adresse" id="adresse" required>
                            <br>
                            <label for="mail">mail</label>
                            <input type="text" name="mail" id="mail" required>

                            <br>

                            <button type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="edit-modal" id="edit-modal">
                    <div class="bg-modal" id="edit-bg-modal"></div>
                    <div class="edit-box">
                        <?php

                        $countreq =  $bdd->prepare("SELECT * FROM adherent");
                        $countreq->execute();
                        while ($count = $countreq->fetch()) {
                            $countArray[] = $count[0];
                        }
                        $arrayMaxLenght = count($countArray);
                        ?>
                        <form action="modifierTable.php" method="post">
                            <br>
                            <label for="id">Choisissez un identifiant :</label>
                            <select name="id" id="id" required>
                                <?php
                                for ($i = 0; $i < $arrayMaxLenght; $i++) {
                                    echo "<option value='$countArray[$i]'>";
                                    echo $countArray[$i];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <br>
                            <label for="nom">Modifier le nom</label>
                            <input type="text" name="nom" id="nom" required>
                            <br>
                            <label for="firstname">Modifier le prénom</label>
                            <input type="text" name="firstname" id="firstname" required>
                            <br>
                            <label for="age">Modifier l'age</label>
                            <input type="number" name="age" id="age" required>
                            <br>
                            <label for="city">Modifier la ville</label>
                            <input type="text" name="city" id="city" required>
                            <br>
                            <label for="adresse">Modifier l'adresse</label>
                            <input type="text" name="adresse" id="adresse" required>
                            <br>
                            <label for="mail">Modifier le mail</label>
                            <input type="text" name="mail" id="mail" required>
                            <br>

                            <br>

                            <button type="submit">Modifier</button>
                        </form>
                    </div>
                </div>
                <div class="delete-modal" id="delete-modal">
                    <div class="bg-modal" id="delete-bg-modal"></div>
                    <div class="delete-box">
                        <form action="supprimer.php" method="post">
                            <br>
                            <label for="id">Choisissez un identifiant :</label>
                            <select name="id" id="id" required>
                                <?php
                                for ($i = 0; $i < $arrayMaxLenght; $i++) {
                                    echo "<option value='$countArray[$i]'>";
                                    echo $countArray[$i];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <br>
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                </div>
                <?php
                require_once('../controllers/afficheTableAdherent.php')
                ?>
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