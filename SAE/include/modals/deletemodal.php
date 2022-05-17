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
    echo '<div class="modal" id="modal">';
    echo '<div class="bg-modal" id="bg-modal"></div>';
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
    echo '<div class="modal" id="modal">';
    echo '<div class="bg-modal" id="bg-modal"></div>';
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
    echo '<div class="modal" id="modal">';
    echo '<div class="bg-modal" id="bg-modal"></div>';
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
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/nos-embarcations.php") {

    $listEmb = $bdd->prepare("SELECT * FROM embarcation");
    try {
        $listEmb->execute();
        while ($countEmb = $listEmb->fetch()) {
            $arrayEmb[] = $countEmb[0];
        }
        if (!empty($arrayEmb)) {
            $len_emb = count($arrayEmb); // longueur du tableau
        }
    } catch (PDOException $th) {
        echo 'Il n\'y a pas d\'embarcations référencée dans la liste';
    }


?>
    <div class="modal" id="modal">
        <div class="bg-modal" id="bg-modal"></div>
        <div class="add-box">
            <form action="" method="post" required>
                <div class="d-flex modal-form">
                    <label for="imm_emb">Choisissez une embarcation à supprimer</label>
                    <select name="imm_emb" id="imm_emb" required>

                        <?php
                        for ($i = 0; $i < $len_emb; $i++) {
                            echo "<option value='$arrayEmb[$i]'>";
                            echo $arrayEmb[$i];
                            echo "</option>";
                        } ?>
                    </select>
                </div>
                <br />

                <input type="submit" name="delEmb" value="Supprimer">
            </form>
        </div>
    </div>
    <?php
    if (!empty($_POST['delEmb'])) {
        $imm_emb = $_POST['imm_emb'];

        $delEmbQuery = "DELETE FROM embarcation WHERE imm_emb = '$imm_emb'";
        $delEmb = $bdd->prepare($delEmbQuery);
        try {
            $delEmb->execute();
        } catch (PDOException $th) { ?>
            <div class="error-message">
                <span>L'embarcation <?php echo $imm_emb ?> est déjà utilisée dans la table emprunt et ne peut pas être supprimée</span>
            </div>
<?php
            $usedEmb = true;
        }
    }
}
        



//var_dump($header, $_SERVER);
