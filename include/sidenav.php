<nav>
    <div class="side-nav">
        <div class="d-flex sn-title">
            <span>MENU</span>
        </div>

        <div class="sn-items d-grid">
            <ul>
                <li><a href="http://bdd.gestion/index.php" id="index">Accueil</a></li>
                <?php
                if (!isset($_SESSION)) {
                    echo "<li><a href='http://bdd.gestion/controllers/connect.php' id='connect'>S'identifier</a></li>";
                }

                ?>
                <?php
                if (isset($_SESSION['userSession'])) {
                    echo "<li><a href='http://bdd.gestion/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                } elseif (isset($_SESSION['adminSession'])) {
                    echo "<li><a href='http://bdd.gestion/reservations.php' id='resa'>Réserver un créneau</a></li>";
                    echo "<li><a href='http://bdd.gestion/voir-mes-reservations.php' id='seeresa'>Voir mes réservations</a></li>";
                    echo "<li><a href='http://bdd.gestion/paiement-cotisation.php' id='paimcot'>Payer ma cotisation</a></li>";
                    echo "<li><a href='http://bdd.gestion/gestion-des-donnees.php' id='gestdonnees'>Gérer la base de données</a></li>";
                    echo "<li><a href='http://bdd.gestion/gestion-des-cotisations.php' id='gestcots'>Gérer les cotisations</a></li>";
                }

                ?>
            </ul>
        </div>
    </div>
</nav>