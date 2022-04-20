<nav>
    <div class="d-flex column side-nav">
        <div class="d-flex sn-title">
            <span>MENU</span>
        </div>

        <div class="sn-items d-grid">
            <ul>
                <li><a href="http://bdd.gestion/SAE/index.php" id="index">Accueil</a></li>
                <?php
                if (!isset($_SESSION)) {
                    echo "<li><a href='http://bdd.gestion/SAE/controllers/connect.php' id='connect'>S'identifier</a></li>";
                }

                ?>
                <?php
                if (isset($_SESSION['userSession'])) {
                    echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                } elseif (isset($_SESSION['adminSession'])) {
                    echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-reservations.php' id='gestdonnees'>Gérer les réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-donnees.php' id='gestdonnees'>Gérer la base de données</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-cotisations.php' id='gestcots'>Gérer les cotisations</a></li>";
                } elseif (isset($_SESSION['plagisteSession'])) {
                    echo "<li><a href='http://bdd.gestion/SAE/pages/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/pages/gestion-des-reservations.php' id='gestdonnees'>Gérer les réservations</a></li>";
                }

                ?>
            </ul>
        </div>

        <div class="d-flex session-info">
            <div class="session-card">
                <div class="content">
                    <img src="http://bdd.gestion/SAE/assets/svg/adherent.svg" alt="/">
                    <span><?php var_dump($_SESSION); ?></span>
                </div>
            </div>
        </div>
        <?php

        if (isset($_SESSION['userSession'])) {
            echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'>Déconnexion</a></div>";
        } elseif (isset($_SESSION['adminSession'])) {
            echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'>Déconnexion</a></div>";
        } elseif (isset($_SESSION['plagisteSession'])) {
            echo "<div class='d-flex logout-button'><a href='http://bdd.gestion/SAE/logout.php'>Déconnexion</a></div>";
        }

        ?>
    </div>
</nav>