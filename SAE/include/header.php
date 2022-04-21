<header>
    <div class="d-flex navbar">
        <h1>NEOTICA</h1>
        <div class="nav-connect">
            <?php
            if (empty($_SESSION)) {
                echo "<a href='http://bdd.gestion/SAE/controllers/connect.php'>Se connecter</a>";
            }
            if (isset($_SESSION['userSession'])) {
                echo $_SESSION['prenom'];
            } elseif (isset($_SESSION['adminSession'])) {
                echo $_SESSION['prenom'];
            } elseif (isset($_SESSION['plagisteSession'])) {
                echo $_SESSION['prenom'];
            }

            ?>
            <span> &nbsp;&nbsp;&nbsp;<img src="http://bdd.gestion/SAE/assets/svg/moon-fill.svg" alt="mode nuit" id="night-mode"></span>

        </div>
    </div>
</header>