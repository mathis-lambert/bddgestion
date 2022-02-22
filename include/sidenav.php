<div class="side-nav">
    <div class="sn-title">
        <h3>MENU DE GESTION</h3>



        <?php
        $isconnect = false;
        $ishome = false;



        if ($ishome == true) {
            echo '';
        } else {
            echo '<a href="index.php"><button>Accueil</button></a>';
        }

        if ($isconnect == true) {
            include_once('controllers/sidepanel.php');
        } else {
            echo '<p> Pour accéder au panneau de contrôle veuillez vous connecter à une base de données</p> </br>';
            echo '<a href="connect.php"><button>accéder à la base de données</button></a>';
        }
        ?>

    </div>
</div>