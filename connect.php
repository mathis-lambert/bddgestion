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
                <h1>Connexion</h1>
                <p>Gestion d'une base de données</p>
                <br>
            </div>
            <div class="connect-form">
                <form action="connect.php" method="POST">
                    <label for="login"> Login : </label>
                    <input type="text" name="login" id="login" required>
                    <br>
                    <label for="password"> Mot de passe : </label>
                    <input type="password" name="password" id="password" required>
                    <br><br>
                    <div class="accueil-btn">
                        <button type="submit">Connexion</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST)) {
                $isconnect = true;
            }
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