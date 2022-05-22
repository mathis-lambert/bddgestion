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

<body>
    <main>
        <!-- INCLUDE SIDE NAV on all pages -->
        <?php
        include_once('include/sidenav.php')
        ?>
        <!-- ----------------------------- -->

        <!--  CONTENEUR DU CONTENU qui comporte le décalage de la side nav -->
        <div class="scale-container">
            <div class="container">
                <?php
                //Fonction pour créer des cartes en dépendant de plusieurs paramètres
                function createCard($jsLink, $icon, $title, $desc, $button)
                {
                ?>
                    <div class='d-flex col-4 control-box' onclick="<?php echo $jsLink ?>()">
                        <div class="control-box-content">
                            <ul>
                                <li>
                                    <?php echo $icon; ?>
                                </li>
                                <li> <?php echo $title ?></li>
                                <li>
                                    <p> <?php echo $desc ?></p>
                                </li>
                                <li><button><a href="#"> <?php echo $button ?></a></button></li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                //Fonction pour créer des cartes en dépendant de plusieurs paramètres
                function createOverview($border, $jsLink, $title, $desc)
                {
                ?>
                    <div class=' d-flex col-4 <?php echo $border ?> overview-box' onclick="<?php echo $jsLink ?>()">
                        <div class="overview-box-content">
                            <ul>
                                <li> <?php echo $title ?></li>
                                <li>
                                    <p> <?php echo $desc ?></p>
                                </li>
                        </div>
                        </ul>
                    </div>
                <?php
                }

                if (isset($_SESSION['role'])) {
                    echo '<h1> Accueil </h1>';
                    echo "<br />" . "<br />";
                    echo '<div class="d-flex row control-container">';

                    createOverview(
                        'bd-green',
                        'profil',
                        'Bienvenue ' . $_SESSION['prenom'],
                        'Nous sommes le ' . date('d M Y') . ' et il est ' . date("H:m.")
                    );
                    if ($_SESSION['isCot'] == true) {
                        createOverview(
                            'bd-green',
                            'cotiser',
                            'Vous êtes à jour',
                            'Vous êtes adhérents depuis ' . $_SESSION['dayFromLastCot'] . ' jours, et il reste ' . $_SESSION['dayTillNextCot'] . ' jours avant la prochaine cotisation'
                        );
                    } else {
                        createOverview(
                            'bd-red',
                            'cotiser',
                            'Vous n\'êtes pas à jour',
                            'Veuillez cotiser pour pouvoir profiter des fonctionnalités qu\'offre ce site'
                        );
                    }
                    createOverview(
                        'bd-green',
                        'reservation',
                        'Vous n\'avez pas de réservations en cours',
                        'lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.'
                    );

                    if (($_SESSION['role'] == 'adherent')) {
                        // CARD
                        createCard(
                            "reservation",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>',
                            'Réservations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Réserver"
                        );

                        createCard(
                            "embarcation",
                            '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 971.35 971.37"><g id="a"/><g id="b"><g id="c"><g><path d="M971.35,104.35v51.23c-.58,2.75-1.44,5.47-1.68,8.25-3.13,36.08-11.62,70.92-24.06,104.86-27.35,74.59-71.3,139-122.33,199.02-12.63,14.85-25.81,29.23-39.04,44.18,7.35,10.38,14.66,20.27,21.51,30.47,55.25,82.28,110.42,164.62,165.61,246.94v9.49c-3.95,8.73-10.91,13-20.1,15.39-32.97,8.6-65.74,17.96-98.73,26.52-7.03,1.82-10.25,5.06-12.06,12.09-8.68,33.6-18,67.04-27,100.57-2.27,8.46-6.23,16.31-15.41,17.12-5.98,.52-13.3-1.58-18.34-4.99-95.77-64.73-191.33-129.79-286.79-194.98-5.11-3.49-8.27-4.28-13.9-.43-95.42,65.26-191.02,130.25-286.66,195.18-16.94,11.5-29.44,6.66-34.77-12.96-9.1-33.5-18.3-66.97-27.06-100.55-1.65-6.33-4.74-9.27-10.98-10.91-33.27-8.72-66.42-17.87-99.62-26.84-20.51-5.54-25.43-17.54-13.62-35.06,58.08-86.17,116.34-172.23,174.53-258.32,2.06-3.05,4.1-6.12,6.24-9.32-3.99-4.3-7.44-7.98-10.84-11.69-45.24-49.26-86.39-101.55-118.48-160.49C7.6,247-13.37,150.28,8.8,45.8,13.51,23.65,22.79,11.68,45.48,9.25,65.18,7.14,84.68,3.16,104.27,0,120.71,0,137.16,0,153.6,0c2.45,.52,4.88,1.31,7.35,1.5,32.93,2.54,64.89,9.72,96.13,20.25,70.41,23.74,132.03,62.81,189.49,109.03,13.22,10.64,26.1,21.7,38.22,31.81,27.4-21.34,53.47-42.91,80.83-62.68,59.69-43.12,124.35-76.1,197.01-91.37C780.18,4.87,798.05,2.81,815.77,0c17.08,0,34.15,0,51.23,0,19.25,3.11,38.41,7.19,57.78,9.07,23.58,2.29,35.25,14.09,37.54,37.61,1.89,19.33,5.94,38.46,9.03,57.67ZM49.58,782.74c28.36,7.7,55.42,15.21,82.62,22.2,2.88,.74,7.42-.56,9.67-2.59,8.89-8.07,16.97-17.01,25.76-25.2,3.79-3.53,4.38-6.53,2.71-11.46-7.36-21.75-2.94-41.59,12.95-57.79,35.85-36.58,72.12-72.78,108.66-108.67,15.41-15.14,34.54-19.61,55.19-13.25,7.33,2.26,11.24,.4,16.16-4.53,119.95-120.2,240.05-240.25,360.13-360.31,2.68-2.68,5.33-5.47,8.38-7.66,7.21-5.17,17.28-4.35,23.61,1.58,6.6,6.18,7.96,16.65,2.71,24.22-2.32,3.34-5.36,6.21-8.26,9.11-120.06,120.09-240.12,240.17-360.25,360.19-4.19,4.18-6.96,7.32-4.61,14.42,7.06,21.28,2.44,40.94-13.23,56.89-35.69,36.31-71.68,72.33-108.01,107.98-16.19,15.89-35.95,20.47-57.75,13.3-4.79-1.58-7.87-1.55-11.52,2.41-8.15,8.82-17.17,16.84-25.18,25.77-2.17,2.42-3.41,7.3-2.64,10.45,5.07,20.53,10.8,40.89,16.36,61.3,1.85,6.79,3.83,13.55,5.86,20.72,2.23-1.18,3.39-1.67,4.42-2.36,78.79-52.7,158.34-104.3,236.18-158.37,118.1-82.05,229.92-171.84,328.47-277.2,48.09-51.42,92.08-105.93,125.32-168.37,36.73-68.99,56.44-141.79,48.22-220.63-.79-7.57-1.94-15.11-3.3-25.57-16.87,17.15-31.41,32.04-46.07,46.81-12.44,12.54-22.84,14.26-31.9,5.49-9.32-9.03-7.63-19.66,5.28-32.56,14.71-14.7,29.47-29.34,45.1-44.9-3.49-1.05-5.44-1.91-7.47-2.22-50.8-7.73-100.84-3.96-150.12,10.33-69.43,20.14-129.87,56.96-186.08,101.3-86.93,68.56-160.76,149.99-229.77,236.01-99.02,123.42-187.78,254.13-273.96,386.65-1.17,1.8-2.1,3.76-3.62,6.51ZM456.01,188.87s-.16-.62-.59-1c-42.06-37.08-86.58-70.76-136.01-97.54C249.58,52.5,175.86,31.66,95.65,39.84c-7.87,.8-15.7,2.07-25.77,3.42,17.78,17.74,33.72,33.46,49.44,49.4,9.45,9.58,10.08,20.34,2.15,28.51-8.17,8.42-19.27,7.82-29.19-1.94-14.19-13.97-28.17-28.15-42.29-42.19-1.82-1.81-3.91-3.33-6.61-5.59-.72,2.85-1.23,4.33-1.46,5.84-7.42,48.8-4.31,96.97,8.61,144.58,18.07,66.61,51.64,125.28,93.17,179.59,20.65,27,43.06,52.64,64.95,79.22,36.32-46.98,71.42-92.37,106.67-137.97-1.39-1.53-2.59-2.97-3.91-4.29-31.5-31.53-63.07-62.98-94.47-94.6-9.04-9.1-9.35-20.82-1.33-28.56,7.75-7.48,18.93-6.96,27.9,1.6,6.86,6.54,13.46,13.36,20.16,20.07,25.42,25.5,50.83,51,75.88,76.14,38.95-41.55,77.38-82.54,116.45-124.22Zm326.09,734.66c5-18.38,9.38-34.11,13.55-49.9,3.53-13.38,11.95-28.22,8.77-39.83-3.2-11.7-18.03-20.22-27.77-30.14-.44-.45-.83-1.17-1.35-1.29-2.72-.64-5.84-2.24-8.16-1.49-24.59,8-45.23,1.83-63.15-16.22-32.53-32.76-65.25-65.33-97.9-97.96-2.4-2.4-4.9-4.7-7.38-7.07-26.93,20.8-53.33,41.2-81.92,63.27,88.96,60.56,176.53,120.19,265.31,180.63Zm-23.85-384.68c-25.16,23.63-48.3,45.37-72.33,67.94,3.28,2.8,6.09,4.89,8.55,7.34,30.43,30.35,60.77,60.81,91.23,91.13,13.34,13.27,22.51,29.83,17.5,47.66-4.99,17.73,1.43,27.49,13.51,37.09,1.72,1.37,3.43,2.91,4.67,4.7,7.26,10.47,15.96,12.01,28.22,8.02,23.5-7.63,47.62-13.37,73.61-20.48-55.45-81.82-109.94-162.22-164.96-243.42ZM223.6,769.07c6.74-4.55,12.75-7.41,17.22-11.82,33.51-33.09,66.72-66.49,100-99.82,2.22-2.23,4.52-4.5,6.18-7.13,4.27-6.77,4.23-13.86-.12-20.53-4.4-6.76-11.17-9.88-18.81-7.74-4.87,1.36-9.76,4.5-13.39,8.09-33.72,33.33-67.17,66.93-100.66,100.49-2.22,2.23-5.51,4.54-5.92,7.18-.97,6.18-2.5,13.55-.05,18.64,2.44,5.07,9.44,7.94,15.57,12.64Zm434.1-138.41c-10.31,8.68-19.6,16.51-29.14,24.54,35.57,35.66,70.24,70.65,105.22,105.31,8.4,8.32,19.58,7.8,27.07,.03,7.28-7.56,7.34-17.88-.22-26.43-4.17-4.73-8.83-9.03-13.29-13.5-29.63-29.74-59.27-59.47-89.64-89.94Z"/><path d="M803.49,149.72c10.46,.27,18.32,8.51,18.16,19.07-.16,10.31-8.64,18.74-18.81,18.67-10.38-.07-19.39-9.51-18.88-19.79,.5-10.24,9.19-18.22,19.53-17.96Z"/><path d="M149.6,168.45c0-10.52,8-18.63,18.5-18.74,10.3-.11,18.94,8.11,19.23,18.28,.29,10.3-8.91,19.63-19.23,19.48-10.09-.14-18.49-8.78-18.5-19.02Z"/></g></g></g></svg>',
                            'Embarcations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Voir"
                        );

                        createCard(
                            "paimCot",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z"/>
                                    </svg>',
                            'Payer ma cotisation',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Payer"
                        );
                        // ----
                    } elseif (($_SESSION['role'] == 'plagiste')) {
                        // CARD
                        createCard(
                            "reservation",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>',
                            'Réservations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Réserver"
                        );

                        createCard(
                            "embarcation",
                            '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 971.35 971.37"><g id="a"/><g id="b"><g id="c"><g><path d="M971.35,104.35v51.23c-.58,2.75-1.44,5.47-1.68,8.25-3.13,36.08-11.62,70.92-24.06,104.86-27.35,74.59-71.3,139-122.33,199.02-12.63,14.85-25.81,29.23-39.04,44.18,7.35,10.38,14.66,20.27,21.51,30.47,55.25,82.28,110.42,164.62,165.61,246.94v9.49c-3.95,8.73-10.91,13-20.1,15.39-32.97,8.6-65.74,17.96-98.73,26.52-7.03,1.82-10.25,5.06-12.06,12.09-8.68,33.6-18,67.04-27,100.57-2.27,8.46-6.23,16.31-15.41,17.12-5.98,.52-13.3-1.58-18.34-4.99-95.77-64.73-191.33-129.79-286.79-194.98-5.11-3.49-8.27-4.28-13.9-.43-95.42,65.26-191.02,130.25-286.66,195.18-16.94,11.5-29.44,6.66-34.77-12.96-9.1-33.5-18.3-66.97-27.06-100.55-1.65-6.33-4.74-9.27-10.98-10.91-33.27-8.72-66.42-17.87-99.62-26.84-20.51-5.54-25.43-17.54-13.62-35.06,58.08-86.17,116.34-172.23,174.53-258.32,2.06-3.05,4.1-6.12,6.24-9.32-3.99-4.3-7.44-7.98-10.84-11.69-45.24-49.26-86.39-101.55-118.48-160.49C7.6,247-13.37,150.28,8.8,45.8,13.51,23.65,22.79,11.68,45.48,9.25,65.18,7.14,84.68,3.16,104.27,0,120.71,0,137.16,0,153.6,0c2.45,.52,4.88,1.31,7.35,1.5,32.93,2.54,64.89,9.72,96.13,20.25,70.41,23.74,132.03,62.81,189.49,109.03,13.22,10.64,26.1,21.7,38.22,31.81,27.4-21.34,53.47-42.91,80.83-62.68,59.69-43.12,124.35-76.1,197.01-91.37C780.18,4.87,798.05,2.81,815.77,0c17.08,0,34.15,0,51.23,0,19.25,3.11,38.41,7.19,57.78,9.07,23.58,2.29,35.25,14.09,37.54,37.61,1.89,19.33,5.94,38.46,9.03,57.67ZM49.58,782.74c28.36,7.7,55.42,15.21,82.62,22.2,2.88,.74,7.42-.56,9.67-2.59,8.89-8.07,16.97-17.01,25.76-25.2,3.79-3.53,4.38-6.53,2.71-11.46-7.36-21.75-2.94-41.59,12.95-57.79,35.85-36.58,72.12-72.78,108.66-108.67,15.41-15.14,34.54-19.61,55.19-13.25,7.33,2.26,11.24,.4,16.16-4.53,119.95-120.2,240.05-240.25,360.13-360.31,2.68-2.68,5.33-5.47,8.38-7.66,7.21-5.17,17.28-4.35,23.61,1.58,6.6,6.18,7.96,16.65,2.71,24.22-2.32,3.34-5.36,6.21-8.26,9.11-120.06,120.09-240.12,240.17-360.25,360.19-4.19,4.18-6.96,7.32-4.61,14.42,7.06,21.28,2.44,40.94-13.23,56.89-35.69,36.31-71.68,72.33-108.01,107.98-16.19,15.89-35.95,20.47-57.75,13.3-4.79-1.58-7.87-1.55-11.52,2.41-8.15,8.82-17.17,16.84-25.18,25.77-2.17,2.42-3.41,7.3-2.64,10.45,5.07,20.53,10.8,40.89,16.36,61.3,1.85,6.79,3.83,13.55,5.86,20.72,2.23-1.18,3.39-1.67,4.42-2.36,78.79-52.7,158.34-104.3,236.18-158.37,118.1-82.05,229.92-171.84,328.47-277.2,48.09-51.42,92.08-105.93,125.32-168.37,36.73-68.99,56.44-141.79,48.22-220.63-.79-7.57-1.94-15.11-3.3-25.57-16.87,17.15-31.41,32.04-46.07,46.81-12.44,12.54-22.84,14.26-31.9,5.49-9.32-9.03-7.63-19.66,5.28-32.56,14.71-14.7,29.47-29.34,45.1-44.9-3.49-1.05-5.44-1.91-7.47-2.22-50.8-7.73-100.84-3.96-150.12,10.33-69.43,20.14-129.87,56.96-186.08,101.3-86.93,68.56-160.76,149.99-229.77,236.01-99.02,123.42-187.78,254.13-273.96,386.65-1.17,1.8-2.1,3.76-3.62,6.51ZM456.01,188.87s-.16-.62-.59-1c-42.06-37.08-86.58-70.76-136.01-97.54C249.58,52.5,175.86,31.66,95.65,39.84c-7.87,.8-15.7,2.07-25.77,3.42,17.78,17.74,33.72,33.46,49.44,49.4,9.45,9.58,10.08,20.34,2.15,28.51-8.17,8.42-19.27,7.82-29.19-1.94-14.19-13.97-28.17-28.15-42.29-42.19-1.82-1.81-3.91-3.33-6.61-5.59-.72,2.85-1.23,4.33-1.46,5.84-7.42,48.8-4.31,96.97,8.61,144.58,18.07,66.61,51.64,125.28,93.17,179.59,20.65,27,43.06,52.64,64.95,79.22,36.32-46.98,71.42-92.37,106.67-137.97-1.39-1.53-2.59-2.97-3.91-4.29-31.5-31.53-63.07-62.98-94.47-94.6-9.04-9.1-9.35-20.82-1.33-28.56,7.75-7.48,18.93-6.96,27.9,1.6,6.86,6.54,13.46,13.36,20.16,20.07,25.42,25.5,50.83,51,75.88,76.14,38.95-41.55,77.38-82.54,116.45-124.22Zm326.09,734.66c5-18.38,9.38-34.11,13.55-49.9,3.53-13.38,11.95-28.22,8.77-39.83-3.2-11.7-18.03-20.22-27.77-30.14-.44-.45-.83-1.17-1.35-1.29-2.72-.64-5.84-2.24-8.16-1.49-24.59,8-45.23,1.83-63.15-16.22-32.53-32.76-65.25-65.33-97.9-97.96-2.4-2.4-4.9-4.7-7.38-7.07-26.93,20.8-53.33,41.2-81.92,63.27,88.96,60.56,176.53,120.19,265.31,180.63Zm-23.85-384.68c-25.16,23.63-48.3,45.37-72.33,67.94,3.28,2.8,6.09,4.89,8.55,7.34,30.43,30.35,60.77,60.81,91.23,91.13,13.34,13.27,22.51,29.83,17.5,47.66-4.99,17.73,1.43,27.49,13.51,37.09,1.72,1.37,3.43,2.91,4.67,4.7,7.26,10.47,15.96,12.01,28.22,8.02,23.5-7.63,47.62-13.37,73.61-20.48-55.45-81.82-109.94-162.22-164.96-243.42ZM223.6,769.07c6.74-4.55,12.75-7.41,17.22-11.82,33.51-33.09,66.72-66.49,100-99.82,2.22-2.23,4.52-4.5,6.18-7.13,4.27-6.77,4.23-13.86-.12-20.53-4.4-6.76-11.17-9.88-18.81-7.74-4.87,1.36-9.76,4.5-13.39,8.09-33.72,33.33-67.17,66.93-100.66,100.49-2.22,2.23-5.51,4.54-5.92,7.18-.97,6.18-2.5,13.55-.05,18.64,2.44,5.07,9.44,7.94,15.57,12.64Zm434.1-138.41c-10.31,8.68-19.6,16.51-29.14,24.54,35.57,35.66,70.24,70.65,105.22,105.31,8.4,8.32,19.58,7.8,27.07,.03,7.28-7.56,7.34-17.88-.22-26.43-4.17-4.73-8.83-9.03-13.29-13.5-29.63-29.74-59.27-59.47-89.64-89.94Z"/><path d="M803.49,149.72c10.46,.27,18.32,8.51,18.16,19.07-.16,10.31-8.64,18.74-18.81,18.67-10.38-.07-19.39-9.51-18.88-19.79,.5-10.24,9.19-18.22,19.53-17.96Z"/><path d="M149.6,168.45c0-10.52,8-18.63,18.5-18.74,10.3-.11,18.94,8.11,19.23,18.28,.29,10.3-8.91,19.63-19.23,19.48-10.09-.14-18.49-8.78-18.5-19.02Z"/></g></g></g></svg>',
                            'Embarcations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Voir"
                        );

                        createCard(
                            "paimCot",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z"/>
                                    </svg>',
                            'Payer ma cotisation',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Payer"
                        );

                        createCard(
                            "gestCot",
                            "http://bdd.gestion/SAE/assets/svg/gestCash.svg",
                            'Gérer les cotisations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Gérer"
                        );
                        // -----
                    } elseif (($_SESSION['role'] == 'admin')) {
                        // CARD
                        createCard(
                            "reservation",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>',
                            'Réservations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Réserver"
                        );

                        createCard(
                            "embarcation",
                            '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 971.35 971.37"><g id="a"/><g id="b"><g id="c"><g><path d="M971.35,104.35v51.23c-.58,2.75-1.44,5.47-1.68,8.25-3.13,36.08-11.62,70.92-24.06,104.86-27.35,74.59-71.3,139-122.33,199.02-12.63,14.85-25.81,29.23-39.04,44.18,7.35,10.38,14.66,20.27,21.51,30.47,55.25,82.28,110.42,164.62,165.61,246.94v9.49c-3.95,8.73-10.91,13-20.1,15.39-32.97,8.6-65.74,17.96-98.73,26.52-7.03,1.82-10.25,5.06-12.06,12.09-8.68,33.6-18,67.04-27,100.57-2.27,8.46-6.23,16.31-15.41,17.12-5.98,.52-13.3-1.58-18.34-4.99-95.77-64.73-191.33-129.79-286.79-194.98-5.11-3.49-8.27-4.28-13.9-.43-95.42,65.26-191.02,130.25-286.66,195.18-16.94,11.5-29.44,6.66-34.77-12.96-9.1-33.5-18.3-66.97-27.06-100.55-1.65-6.33-4.74-9.27-10.98-10.91-33.27-8.72-66.42-17.87-99.62-26.84-20.51-5.54-25.43-17.54-13.62-35.06,58.08-86.17,116.34-172.23,174.53-258.32,2.06-3.05,4.1-6.12,6.24-9.32-3.99-4.3-7.44-7.98-10.84-11.69-45.24-49.26-86.39-101.55-118.48-160.49C7.6,247-13.37,150.28,8.8,45.8,13.51,23.65,22.79,11.68,45.48,9.25,65.18,7.14,84.68,3.16,104.27,0,120.71,0,137.16,0,153.6,0c2.45,.52,4.88,1.31,7.35,1.5,32.93,2.54,64.89,9.72,96.13,20.25,70.41,23.74,132.03,62.81,189.49,109.03,13.22,10.64,26.1,21.7,38.22,31.81,27.4-21.34,53.47-42.91,80.83-62.68,59.69-43.12,124.35-76.1,197.01-91.37C780.18,4.87,798.05,2.81,815.77,0c17.08,0,34.15,0,51.23,0,19.25,3.11,38.41,7.19,57.78,9.07,23.58,2.29,35.25,14.09,37.54,37.61,1.89,19.33,5.94,38.46,9.03,57.67ZM49.58,782.74c28.36,7.7,55.42,15.21,82.62,22.2,2.88,.74,7.42-.56,9.67-2.59,8.89-8.07,16.97-17.01,25.76-25.2,3.79-3.53,4.38-6.53,2.71-11.46-7.36-21.75-2.94-41.59,12.95-57.79,35.85-36.58,72.12-72.78,108.66-108.67,15.41-15.14,34.54-19.61,55.19-13.25,7.33,2.26,11.24,.4,16.16-4.53,119.95-120.2,240.05-240.25,360.13-360.31,2.68-2.68,5.33-5.47,8.38-7.66,7.21-5.17,17.28-4.35,23.61,1.58,6.6,6.18,7.96,16.65,2.71,24.22-2.32,3.34-5.36,6.21-8.26,9.11-120.06,120.09-240.12,240.17-360.25,360.19-4.19,4.18-6.96,7.32-4.61,14.42,7.06,21.28,2.44,40.94-13.23,56.89-35.69,36.31-71.68,72.33-108.01,107.98-16.19,15.89-35.95,20.47-57.75,13.3-4.79-1.58-7.87-1.55-11.52,2.41-8.15,8.82-17.17,16.84-25.18,25.77-2.17,2.42-3.41,7.3-2.64,10.45,5.07,20.53,10.8,40.89,16.36,61.3,1.85,6.79,3.83,13.55,5.86,20.72,2.23-1.18,3.39-1.67,4.42-2.36,78.79-52.7,158.34-104.3,236.18-158.37,118.1-82.05,229.92-171.84,328.47-277.2,48.09-51.42,92.08-105.93,125.32-168.37,36.73-68.99,56.44-141.79,48.22-220.63-.79-7.57-1.94-15.11-3.3-25.57-16.87,17.15-31.41,32.04-46.07,46.81-12.44,12.54-22.84,14.26-31.9,5.49-9.32-9.03-7.63-19.66,5.28-32.56,14.71-14.7,29.47-29.34,45.1-44.9-3.49-1.05-5.44-1.91-7.47-2.22-50.8-7.73-100.84-3.96-150.12,10.33-69.43,20.14-129.87,56.96-186.08,101.3-86.93,68.56-160.76,149.99-229.77,236.01-99.02,123.42-187.78,254.13-273.96,386.65-1.17,1.8-2.1,3.76-3.62,6.51ZM456.01,188.87s-.16-.62-.59-1c-42.06-37.08-86.58-70.76-136.01-97.54C249.58,52.5,175.86,31.66,95.65,39.84c-7.87,.8-15.7,2.07-25.77,3.42,17.78,17.74,33.72,33.46,49.44,49.4,9.45,9.58,10.08,20.34,2.15,28.51-8.17,8.42-19.27,7.82-29.19-1.94-14.19-13.97-28.17-28.15-42.29-42.19-1.82-1.81-3.91-3.33-6.61-5.59-.72,2.85-1.23,4.33-1.46,5.84-7.42,48.8-4.31,96.97,8.61,144.58,18.07,66.61,51.64,125.28,93.17,179.59,20.65,27,43.06,52.64,64.95,79.22,36.32-46.98,71.42-92.37,106.67-137.97-1.39-1.53-2.59-2.97-3.91-4.29-31.5-31.53-63.07-62.98-94.47-94.6-9.04-9.1-9.35-20.82-1.33-28.56,7.75-7.48,18.93-6.96,27.9,1.6,6.86,6.54,13.46,13.36,20.16,20.07,25.42,25.5,50.83,51,75.88,76.14,38.95-41.55,77.38-82.54,116.45-124.22Zm326.09,734.66c5-18.38,9.38-34.11,13.55-49.9,3.53-13.38,11.95-28.22,8.77-39.83-3.2-11.7-18.03-20.22-27.77-30.14-.44-.45-.83-1.17-1.35-1.29-2.72-.64-5.84-2.24-8.16-1.49-24.59,8-45.23,1.83-63.15-16.22-32.53-32.76-65.25-65.33-97.9-97.96-2.4-2.4-4.9-4.7-7.38-7.07-26.93,20.8-53.33,41.2-81.92,63.27,88.96,60.56,176.53,120.19,265.31,180.63Zm-23.85-384.68c-25.16,23.63-48.3,45.37-72.33,67.94,3.28,2.8,6.09,4.89,8.55,7.34,30.43,30.35,60.77,60.81,91.23,91.13,13.34,13.27,22.51,29.83,17.5,47.66-4.99,17.73,1.43,27.49,13.51,37.09,1.72,1.37,3.43,2.91,4.67,4.7,7.26,10.47,15.96,12.01,28.22,8.02,23.5-7.63,47.62-13.37,73.61-20.48-55.45-81.82-109.94-162.22-164.96-243.42ZM223.6,769.07c6.74-4.55,12.75-7.41,17.22-11.82,33.51-33.09,66.72-66.49,100-99.82,2.22-2.23,4.52-4.5,6.18-7.13,4.27-6.77,4.23-13.86-.12-20.53-4.4-6.76-11.17-9.88-18.81-7.74-4.87,1.36-9.76,4.5-13.39,8.09-33.72,33.33-67.17,66.93-100.66,100.49-2.22,2.23-5.51,4.54-5.92,7.18-.97,6.18-2.5,13.55-.05,18.64,2.44,5.07,9.44,7.94,15.57,12.64Zm434.1-138.41c-10.31,8.68-19.6,16.51-29.14,24.54,35.57,35.66,70.24,70.65,105.22,105.31,8.4,8.32,19.58,7.8,27.07,.03,7.28-7.56,7.34-17.88-.22-26.43-4.17-4.73-8.83-9.03-13.29-13.5-29.63-29.74-59.27-59.47-89.64-89.94Z"/><path d="M803.49,149.72c10.46,.27,18.32,8.51,18.16,19.07-.16,10.31-8.64,18.74-18.81,18.67-10.38-.07-19.39-9.51-18.88-19.79,.5-10.24,9.19-18.22,19.53-17.96Z"/><path d="M149.6,168.45c0-10.52,8-18.63,18.5-18.74,10.3-.11,18.94,8.11,19.23,18.28,.29,10.3-8.91,19.63-19.23,19.48-10.09-.14-18.49-8.78-18.5-19.02Z"/></g></g></g></svg>',
                            'Embarcations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Voir"
                        );


                        createCard(
                            "paimCot",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z"/>
                                    </svg>',
                            'Payer ma cotisation',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Payer"
                        );

                        createCard(
                            "gestAdh",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                    </svg>',
                            'Gérer les adhérents',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Gérer"
                        );

                        createCard(
                            "gestCot",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                    <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                    </svg>',
                            'Gérer les cotisations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Gérer"
                        );

                        createCard(
                            "gestResa",
                            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM9 8a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zm-8 2h4a1 1 0 1 1 0 2H1v-2z"/>
                                    </svg>',
                            'Gérer les réservations',
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, necessitatibus.",
                            "Gérer"
                        );
                        // --------
                    }
                    echo '</div>';
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