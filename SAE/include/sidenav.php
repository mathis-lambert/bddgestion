<nav>
    <div class="d-flex column side-nav">
        <div class="d-flex sn-title">
            <span>MENU</span>
        </div>

        <div class="sn-items d-grid">
            <ul>
                <li><a href="http://bdd.gestion/SAE/index.php" id="index">
                        <div class="d-flex a-tab"><img src='http://bdd.gestion/SAE/assets/svg/home.svg'>Accueil</div>
                    </a></li>
                <?php
                if (!empty($_SESSION)) {
                    if (($_SESSION['role'] == 'adherent')) {
                        echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/resaDemande.svg'> Réserver un créneau</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/reservation.svg'> Voir mes réservations</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/euro.svg'> Payer ma cotisation</div></a></li>";
                    } elseif (($_SESSION['role'] == 'admin')) {
                        echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/resaDemande.svg'> Réserver un créneau</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/reservation.svg'> Voir mes réservations</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/euro.svg'> Payer ma cotisation</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-donnees.php' id='gestadh'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/adherent.svg'> Gérer les adhérents</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-cotisations.php' id='gestcots'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/gestCash.svg'> Gérer les cotisations</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-reservations.php' id='gestresa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/gestResa.svg'> Gérer les réservations</div></a></li>";
                    } elseif (($_SESSION['role'] == 'plagiste')) {
                        echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/resaDemande.svg'> Réserver un créneau</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/reservation.svg'> Voir mes réservations</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/euro.svg'> Payer ma cotisation</div></a></li>";
                        echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-reservations.php' id='gestresa'><div class='d-flex a-tab'><img src='http://bdd.gestion/SAE/assets/svg/gestResa.svg'> Gérer les réservations</div></a></li>";
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
            }
            echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'><div class='d-flex a-tab justify-center'><img src='http://bdd.gestion/SAE/assets/svg/logout.svg'>Déconnexion</div></a></div>";
        }

        ?>
    </div>
</nav>