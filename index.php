<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'une base de données</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="style/style.css">

    <!-- CSS OTHERS -->


</head>

<body>

    <!-- ###### HEADER ###### -->
    <?php
    include_once('include/header.php');
    ?>
    <!---->

    <main>
        <!-- ###### FOOTER ###### -->
        <?php
        include_once('include/sidenav.php');
        ?>
        <!---->
        <div class="accueil">
            <div class="title">
                <h1>Accueil</h1>
                <p>Gestion d'une base de données</p>
                <br>
            </div>
            <div class="content">
                <h2>Bienvenue sur notre site !</h2>
                <p>Sur ce site vous allez pouvoir accéder à la gestion d'une base de données, ajouter, modifier ou supprimer des éléments.</p>
                <br><br>
            </div>
            <div class="accueil-btn">
                <a href="connect.php"><button>accéder à la base de données</button></a>
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