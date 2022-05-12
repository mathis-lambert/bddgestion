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
                    <h2>vos Cotisations :</h2>
                    <button id="cotiser">Cotiser maintenant</button>
                </div>
                <br>
                <div class="table-container">
                    <?php
                    require_once('../include/modals/cotisModal.php');
                    require_once('../controllers/afficheTableCotisationAdh.php')
                    ?>

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