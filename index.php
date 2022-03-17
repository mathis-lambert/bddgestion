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
            <?php
            include_once('include/content.php')
            ?>
        </div>
    </main>


    <!-- ###### FOOTER ###### -->
    <?php
    include_once('include/footer.php');
    ?>
    <!---->


</body>

</html>