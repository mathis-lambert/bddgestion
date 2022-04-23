<nav>
    <div class="d-flex column side-nav">
        <div class="d-flex sn-title">
            <span>MENU</span>
        </div>

        <div class="sn-items d-grid">
            <ul>
                <li><a href="http://bdd.gestion/SAE/index.php" id="index">Accueil</a></li>
                <?php
                if (!empty($_SESSION)) {
                    if (($_SESSION['role'] == 'adherent')) {
                        echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'>Réserver un créneau</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                    } elseif (($_SESSION['role'] == 'admin')) {
                        echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'>Réserver un créneau</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-donnees.php' id='gestadh'>Gérer les adhérents</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-cotisations.php' id='gestcots'>Gérer les cotisations</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-reservations.php' id='gestresa'>Gérer les réservations</a></li>";
                    } elseif (($_SESSION['role'] == 'plagiste')) {
                        echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'>Réserver un créneau</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-reservations.php' id='gestdonnees'>Gérer les réservations</a></li>";
                    }
                } else {
                    echo "<li><a href='http://bdd.gestion/SAE/controllers/connect.php' id='connect'>S'identifier</a></li>";
                }
                /* var_dump($_SESSION); */
                ?>
            </ul>
        </div>


        <?php

        if (!empty($_SESSION)) {
            if ($_SESSION['role'] == 'adherent') {
                echo "        
        <div class='d-flex session-info'>
            <div class='session-card'>
                <div class='content'>
                    <img src='http://bdd.gestion/SAE/assets/svg/adherent.svg'>
                <span>" . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . "</span>
                </div>
            </div>
        </div>
        ";

                echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'>Déconnexion</a></div>";
            } elseif ($_SESSION['role'] == 'admin') {
                echo "        
        <div class='d-flex session-info'>
            <div class='session-card'>
                <div class='content'>
                    <img src='http://bdd.gestion/SAE/assets/svg/adherent.svg'>
                <span>" . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . "</span>
                </div>
            </div>
        </div>
        ";

                echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'>Déconnexion</a></div>";
            } elseif ($_SESSION['role'] == 'plagiste') {
                echo "        
        <div class='d-flex session-info'>
            <div class='session-card'>
                <div class='content'>
                    <img src='http://bdd.gestion/SAE/assets/svg/adherent.svg'>
                <span>" . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . "</span>
                </div>
            </div>
        </div>
        ";

                echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'>Déconnexion</a></div>";
            }
        }

        ?>
    </div>
</nav>