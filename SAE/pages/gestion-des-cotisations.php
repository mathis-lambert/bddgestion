<?php
require_once('../controllers/connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOTICA | Gestion des cotisations</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="../assets/style/style.css">

    <!-- CSS OTHERS -->


</head>

<body>

    <!-- ###### HEADER ###### -->
    <?php
    include_once('../include/header.php');
    ?>
    <!---->

    <main>
        <?php
        include_once('../include/sidenav.php')
        ?>

        <div class="scale-container">
            <div class="container">
                <?php
                if (!empty($_SESSION)) {
                    if (
                        $_SESSION['role'] == 'admin'
                    ) {
                        require_once('../include/editMenu.php');

                        echo "<h2>Contenu de la table Cotisations:</h2>";
                        echo "</br>";
                        echo '<div class="table-container">';

                        require_once('../controllers/afficheTableCotisation.php');

                        echo '</div>';

                        echo "<br /> Nbre de résultats : " . $result->rowCount() . "<br />";
                        $result->closeCursor();
                    } else {
                        echo "<h1> Vous n'avez pas la permission d'accéder à cette page</h1>";
                    }
                } else {
                    echo "<h1> Pour accéder à cette page veuillez vous connecter</h1>";
                }
                ?>
            </div>
        </div>
    </main>


    <!-- ###### FOOTER ###### -->
    <?php
    include_once('../include/footer.php');
    ?>
    <!---->


</body>

</html>