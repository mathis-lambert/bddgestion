<nav>
    <div class="d-flex column side-nav">
        <div class="d-flex column sn-title">
            <span>NEOTICA</span>
        </div>

        <div class="sn-items d-grid">
            <ul>
                <li><a href="http://bdd.gestion/SAE/index.php" id="index">
                        <div class="d-flex a-tab"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>Accueil</div>
                    </a></li>

                <?php
                if (!empty($_SESSION)) {
                    if (($_SESSION['role'] == 'adherent')) {
                        //reservation
                        echo '<li><a href="http://bdd.gestion/SAE/pages/reservations.php" id="resa">';
                        echo '<div class="d-flex a-tab"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">';
                        echo '<path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />';
                        echo '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />';
                        echo '</svg> Réservations</div>';
                        echo '</a></li>';
                        // --------
                        // Cotisation
                        echo '<li><a href="http://bdd.gestion/SAE/pages/paiement-cotisation.php" id="paimcot">';
                        echo '<div class="d-flex a-tab"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-euro" viewBox="0 0 16 16">';
                        echo '<path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z" />';
                        echo '</svg>Cotisations</div>';
                        echo '</a></li>';
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
                    echo '<li><a href="http://bdd.gestion/SAE/controllers/connect-normal.php" id="index">';
                    echo '<div class="d-flex a-tab"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">';
                    echo '<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>';
                    echo '<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>';
                    echo '<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>';
                    echo '</svg>Se connecter</div>';
                    echo '</a></li>';
                }
                /* var_dump($_SESSION); */
                ?>
            </ul>
        </div>

        <div class='d-flex column session-info'>
            <div class='session-card'>
                <div class='content'>
                    <span> Prénom Nom </span>
                </div>
            </div>
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