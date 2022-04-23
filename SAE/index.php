<?php
require_once('controllers/connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOTICA | Gestion</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="assets/style/style.css">

    <!-- CSS OTHERS -->


</head>

<body class="white">

    <!-- ###### HEADER ###### -->
    <?php
    include_once('include/header.php');
    ?>
    <!---->

    <main>
        <?php
        include_once('include/sidenav.php')
        ?>

        <div class="scale-container">
            <div class="container">
                <?php
                //Fonction pour créer des cartes en dépendant de plusieurs paramètres
                function createCard($jsLink, $icon, $title, $desc, $button)
                {
                    echo "<div class='col-4 control-box d-flex' onclick=" . $jsLink . "()>";
                    echo '<div class="control-box-content">';
                    echo '<ul>';
                    echo '<li>';
                    echo '<img src="' . $icon . '" alt="">';
                    echo '</li>';
                    echo '<li>' . $title . '</li>';
                    echo '<li>';
                    echo '<p>' . $desc . '</p>';
                    echo '</li>';
                    echo '<li><button>' . $button . '</button></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';
                }

                if (isset($_SESSION['role'])) {
                    echo '<h1> bonjour ' . $_SESSION['prenom'] . ' vous êtes connecté !  votre identifiant est ' . $_SESSION['id'] . ' et votre role est ' .  $_SESSION['role'] . '</h1>';
                    echo "<br />" . "<br />";
                    echo '<div class="d-flex row control-container">';
                    if (($_SESSION['role'] == 'adherent')) {
                        // CARD
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/resaDemande.svg", 'Réserver un créneau', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Réserver");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/reservation.svg", 'Voir mes réservations', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Voir");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/euro.svg", 'Payer ma cotisation', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Payer");
                    } elseif (($_SESSION['role'] == 'plagiste')) {
                        // CARD
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/resaDemande.svg", 'Réserver un créneau', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Réserver");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/reservation.svg", 'Voir mes réservations', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Voir");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/euro.svg", 'Payer ma cotisation', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Payer");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/gestCash.svg", 'Gérer les cotisations', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Gérer");
                    } elseif (($_SESSION['role'] == 'admin')) {
                        // CARD
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/resaDemande.svg", 'Réserver un créneau', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Réserver");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/reservation.svg", 'Voir mes réservations', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Voir");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/euro.svg", 'Payer ma cotisation', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Payer");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/adherent.svg", 'Gérer les adhérents', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Gérer");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/gestCash.svg", 'Gérer les cotisations', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Gérer");
                        createCard("connectNormal", "http://bdd.gestion/SAE/assets/svg/gestResa.svg", 'Gérer les réservations', "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.", "Gérer");
                    }
                    echo '</div>';
                } else {
                    include_once('include/content.php');
                }
                ?>
            </div>
        </div>
    </main>

    <!-- ###### FOOTER ###### -->
    <?php
    include_once('include/footer.php');
    ?>
    <!---->


</body>

</html>