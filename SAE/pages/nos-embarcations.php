<?php
require_once('../controllers/connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOTICA | Paiement de la cotisation</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="../assets/style/style.css">

    <!-- CSS OTHERS -->


</head>

<body>

    <main>
        <?php
        include_once('../include/sidenav.php')
        ?>

        <div class="scale-container">
            <div class="container">
                <div class="d-flex align-center cot-title">
                    <?php
                    if (!empty($_SESSION)) {
                    ?>
                        <h1>Nos embarcations :</h1>
                </div>
                <br>
                <div class="center table-view">
                    <div class="table-container">

                    <?php
                        require_once('../controllers/afficheTableEmbarcations.php');
                    } else {
                        echo "<h1> Pour accéder à cette page veuillez vous connecter</h1>";
                    }
                    ?>

                    </div>
                </div>
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