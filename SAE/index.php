<?php
require_once('controllers/connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOTICA | Gestion</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="assets/style/style.css">

    <!-- CSS OTHERS -->


</head>

<body class="white">

    <!-- ###### HEADER ###### -->
    <?php
    include_once('include/header.php');
    ?>
    <!---->

    <main>
        <?php
        include_once('include/sidenav.php')
        ?>

        <div class="scale-container">
            <div class="container">
                <?php
                if (isset($_SESSION['userSession'])) {
                    echo '<h1> bonjour ' . $_SESSION['prenom'] . ' vous êtes connecté en tant qu utilisateur ' . $_SESSION['userSession'] . '</h1>';
                } elseif (isset($_SESSION['adminSession'])) {
                    echo '<h1> bonjour ' . $_SESSION['prenom'] . ' vous êtes connecté en tant qu administateur ' . $_SESSION['adminSession'] . '</h1>';
                } elseif (isset($_SESSION['plagisteSession'])) {
                    echo '<h1> bonjour ' . $_SESSION['prenom'] . ' vous êtes connecté en tant que plagiste ' . $_SESSION['plagisteSession'] . '</h1>';
                } else {
                    include_once('include/content.php');
                }
                ?>
            </div>
        </div>
    </main>


    <!-- ###### FOOTER ###### -->
    <?php
    include_once('include/footer.php');
    ?>
    <!---->


</body>

</html>