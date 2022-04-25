<?php
function IsElsewhere($id, $db)
{
    $testIsCotis = "SELECT * FROM cotiser, adherent WHERE adherent.id = cotiser.id and cotiser.id = '$id'";
    $testIsEmpr = "SELECT * FROM adherent, emprunt WHERE adherent.id = emprunt.id and emprunt.id = '$id'";

    $resultCotis = $db->prepare($testIsCotis);
    $resultCotis->execute();
    $resultCotis = $resultCotis->fetch();

    $resultEmpr = $db->prepare($testIsEmpr);
    $resultEmpr->execute();
    $resultEmpr = $resultEmpr->fetch();

    if ($resultEmpr != false && $resultCotis != false) {
        echo "<h1> Avant de supprimer cet adhérent, veuillez supprimer toutes les cotisations qu'il a effectuée</h1>";
    } else {
        $result = $db->prepare("DELETE FROM `adherent` WHERE adherent.id = '$id'");
        $result->execute();
    }
}

if ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-donnees.php") {
    echo '<div class="delete-modal" id="delete-modal">';
    echo '<div class="bg-modal" id="delete-bg-modal"></div>';
    echo '<div class="delete-box">';
    echo '<form action="" method="post">';
    echo '<div class="d-flex modal-form">';
    echo '<label for="id">Choisissez un ID à supprimer :</label>';
    echo '<select name="id" id="id" required>';
    for ($i = 0; $i < $arrayMaxLenght; $i++) {
        echo "<option value='$countArray[$i]'>";
        echo $countArray[$i];
        echo "</option>";
    };
    echo '</select>';
    echo '</div>';
    echo '<br>';
    echo '<input type="submit" name="deleteAdh" value="Supprimer">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    if (!empty($_POST['deleteAdh'])) {
        IsElsewhere($_POST['id'], $bdd);
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-cotisations.php") {
    echo '<div class="delete-modal" id="delete-modal">';
    echo '<div class="bg-modal" id="delete-bg-modal"></div>';
    echo '<div class="delete-box">';
    echo '<form action="" method="post">';
    echo '<div class="d-flex modal-form">';
    echo '<label for="id">Choisissez un ID à supprimer :</label>';
    echo '<select name="id" id="id" required>';
    for ($i = 0; $i < $arrayMaxLenght; $i++) {
        echo "<option value='$countArray[$i]'>";
        echo $countArray[$i];
        echo "</option>";
    };
    echo '</select>';
    echo '</div>';
    echo '<br>';
    echo '<input type="submit" name="deleteCot" value="Supprimer">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    if (!empty($_POST['deleteCot'])) {
        $id = $_POST['id'];
        $delete = $bdd->prepare("DELETE FROM `cotiser` WHERE cotiser.id = '$id'");
        $delete->execute();
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-reservations.php") {
    echo '<div class="delete-modal" id="delete-modal">';
    echo '<div class="bg-modal" id="delete-bg-modal"></div>';
    echo '<div class="delete-box">';
    echo '<form action="" method="post">';
    echo '<div class="d-flex modal-form">';
    echo '<label for="id">Choisissez un ID à supprimer :</label>';
    echo '<select name="id" id="id" required>';
    for ($i = 0; $i < $arrayMaxLenght; $i++) {
        echo "<option value='$countArray[$i]'>";
        echo $countArray[$i];
        echo "</option>";
    };
    echo '</select>';
    echo '</div>';
    echo '<br>';
    echo '<input type="submit" name="deleteEmp" value="Supprimer">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    if (!empty($_POST['deleteEmp'])) {
        $id = $_POST['id'];
        $delete = $bdd->prepare("DELETE FROM `emprunt` WHERE emprunt.id = '$id'");
        $delete->execute();
    }
}



//var_dump($header, $_SERVER);
