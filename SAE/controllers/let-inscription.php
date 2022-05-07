<?php
require('connect-database.php');
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

<body>

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

                <h1>S'inscrire</h1>

                <div class="sp-150"></div>

                <div class="d-flex row justify-center text-center">
                    <div class="col-4 connect-card">
                        <h1 class="text-center">Connexion</h1>
                        <br><br>
                        <form action="" method="POST" class="d-flex align-center column">

                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" placeholder="identifiant" required>

                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" required>

                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" placeholder="Nom" required>

                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Prénom" required>

                            <label for="birthdate">Date de naissance</label>
                            <input type="date" name="birthdate" id="birthdate" required>

                            <label for="zipcode">Code postal</label>
                            <input type="number" name="zipcode" id="zipcode" placeholder="Code postal" required max="99999">

                            <label for="city">Ville</label>
                            <input type="text" name="city" id="city" placeholder="Ville" required>

                            <label for="adress">Adresse</label>
                            <input type="text" name="adress" id="adress" placeholder="123, Boulevard exemple" required>

                            <label for="activity">Activité</label>
                            <input type="text" name="activity" id="activity" placeholder="Activité" required>

                            <label for="phone">Téléphone</label>
                            <input type="text" name="phone" id="phone" placeholder="Téléphone" required>

                            <label for="mail">E-Mail</label>
                            <input type="text" name="mail" id="mail" placeholder="exemple@mail.ex" required>

                            <br>
                            <input type="submit" name="inscription" value="s'inscrire">
                        </form>

                        <?php

                        // date du jour au format sql
                        $todayDate = date("Y-m-d");

                        // obtenir la date du jour non concaténée sous forme d'entier
                        $todayDay = date('d');
                        $todayDay = intval($todayDay);

                        $todayMonth = date('m');
                        $todayMonth = intval($todayMonth);

                        $todayYear = date('Y');
                        $todayYear = intval($todayYear);

                        $months30 = ['avril' => 4, 'juin' => 6, 'septembre' => 9, 'novembre' => 11];
                        $months31 = ['janvier' => 1, 'mars' => 3, 'mai' => 5, 'juillet' => 7, 'aout' => 8, 'octobre' => 10];

                        //obtenir la semaine d'après en réutilisant les variables précédente pour établir une intervalle
                        if ($todayDay > 24 && $todayMonth == 12) {
                            $newDay = $todayDay - 31 + 7;
                            $newMonth = 1;
                            $newYear = $todayYear + 1;
                        } elseif ($todayDay > 20 && $todayMonth == 2) {
                            $newDay = $todayDay - 27 + 7;
                            $newMonth = $todayMonth + 1;
                            $newYear = $todayYear;
                        } elseif ($todayDay > 23 && in_array($todayMonth, $months30)) {
                            $newDay = $todayDay - 30 + 7;
                            $newMonth = $todayMonth + 1;
                            $newYear = $todayYear;
                        } elseif ($todayDay > 24 && in_array($todayMonth, $months31)) {
                            $newDay = $todayDay - 31 + 7;
                            $newMonth = $todayMonth + 1;
                            $newYear = $todayYear;
                        } else {
                            $newDay = $todayDay + 7;
                            $newMonth = $todayMonth;
                            $newYear = $todayYear;
                        }

                        $weekAfter = $newYear . "-" . $newMonth . "-" . $newDay;
                        $yearAfter = $todayYear + 1 . '-' . date('m') . '-' . date('d');
                        /* var_dump($todayDate, $weekAfter, $yearAfter); */

                        if (!empty($_POST['inscription'])) {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $password = $_POST['password'];
                            $firstname = $_POST['firstname'];
                            $birthdate = $_POST['birthdate'];
                            $zipcode = $_POST['zipcode'];
                            $city = $_POST['city'];
                            $adress = $_POST['adress'];
                            $activity = $_POST['activity'];
                            $phone = $_POST['phone'];
                            $mail = $_POST['mail'];

                            $verif_if_id_exists = "SELECT * FROM adherent WHERE adherent.id = '$id'";
                            $verif_result = $bdd->query($verif_if_id_exists);
                            $verif_result = $verif_result->fetch();
                            var_dump($verif_result);


                            if ($verif_result == false) {
                                $inscriptionQuery = "INSERT INTO adherent(id, mot_de_passe, droit, nom_adh, pre_adh, ad_adh, cp_adh, ville_adh, date_nais_adh, tel_adh, email_adh, activ_adh, date_crea_adh, date_deliv_carte_adh, date_exp_carte_adh) VALUES ('$id', md5('$password'), 1, '$name', '$firstname', '$adress', '$zipcode', '$city', '$birthdate', '$phone', '$mail', '$activity', '$todayDate', '$weekAfter', '$yearAfter')";
                                $inscription = $bdd->prepare($inscriptionQuery);
                                $inscription->execute();
                                header('location: http://bdd.gestion/SAE/controllers/connect-normal.php');
                            } else {
                                echo "<br />";
                                echo "<div class='id-false'>";
                                echo "Cet identifiant existe déjà veuillez en essayer un autre ou vous connecter";
                                echo "</div>";
                            }
                        }
                        ?>
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