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


    <main>
        <?php
        include_once('../include/sidenav.php')
        ?>

        <div class="scale-container">
            <div class="container">
                <div class="table-container">
                    <?php
                    require_once('../controllers/afficheTableEmpruntsAdh.php')
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