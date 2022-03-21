<?php
require('connect-database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'une base de données</title>

    <!-- CSS MAIN -->
    <link rel="stylesheet" href="../assets/style/style.css">

    <!-- CSS OTHERS -->


</head>

<body class="white">

    <!-- ###### HEADER ###### -->
    <?php
    include_once('../include/header.php');
    ?>
    <!---->

    <main>
        <!-- ###### SIDENAV ###### -->
        <?php
        include_once('../include/sidenav.php');
        ?>
        <!---->



        <div class="scale-container">
            <div class="container">

                <h1>Se connecter</h1>

                <div class="sp-150"></div>

                <div class="d-flex row control-container">

                    <div class="col-4 control-box d-flex" onclick="connectNormal()">
                        <div class="control-box-content">
                            <ul>
                                <li><img src="../assets/svg/adherent.svg" alt="adhérent"></li>
                                <li>Je suis déjà adhérent</li>
                                <li>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.</p>
                                </li>
                                <li><button>Se connecter</button></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-4 control-box d-flex" onclick="letInscription()">
                        <div class="control-box-content">
                            <ul>
                                <li><img src="../assets/svg/unknown.svg" alt="non-adhérent"></li>
                                <li>Je ne suis pas encore inscrit</li>
                                <li>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.</p>
                                </li>
                                <li><button>S'inscrire</button></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-4 control-box d-flex" onclick="connectAdmin()">
                        <div class="control-box-content">
                            <ul>
                                <li><img src="../assets/svg/admin-profile.svg" alt="admin"></li>
                                <li>Je suis gérant</li>
                                <li>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.</p>
                                </li>
                                <li><button>Se connecter</button></li>
                            </ul>
                        </div>
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