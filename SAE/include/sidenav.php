<nav>
    <div class="side-nav">
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
                    echo "<li><a href='http://bdd.gestion/SAE/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                } elseif (isset($_SESSION['adminSession'])) {
                    echo "<li><a href='http://bdd.gestion/SAE/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/gestion-des-donnees.php' id='gestdonnees'>Gérer la base de données</a></li>";
                    echo "<li><a href='http://bdd.gestion/SAE/gestion-des-cotisations.php' id='gestcots'>Gérer les cotisations</a></li>";
                }

                ?>
            </ul>
        </div>
    </div>
</nav>