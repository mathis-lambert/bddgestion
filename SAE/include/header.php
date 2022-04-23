<header>
    <div class="d-flex navbar">
        <h1>NEOTICA</h1>
        <div class="nav-connect">
            <?php
            if (!empty($_SESSION)) {
                echo $_SESSION['prenom'];
            } else {
                echo "<a href='http://bdd.gestion/SAE/controllers/connect.php'>Se connecter</a>";
            }
            ?>
            <span> &nbsp;&nbsp;&nbsp;<img src="http://bdd.gestion/SAE/assets/svg/moon-fill.svg" alt="mode nuit" id="night-mode"></span>

        </div>
    </div>
</header>