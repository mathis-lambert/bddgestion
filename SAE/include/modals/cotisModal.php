<?php
$id = $_SESSION['id'];
$role = $_SESSION['role'];

echo '<div class="cotis-modal" id="cotis-modal">';
echo '<div class="bg-modal" id="cotis-bg-modal"></div>';
echo '<div class="cotis-box">';
echo '<form action="" method="post">';
echo '<div class="d-flex modal-form">';
echo '<input type="hidden" name="date_cot" value="' . date("Y-m-d") . '" required>';
echo '<input type="hidden" name="id" value="' . $id . '" required>';
echo '<input type="number" name="montant" placeholder="Montant (€)" min="70" required>';
/*     echo '<input type="text" name="role" id="role" placeholder="Rôle" required>'; */
echo '<input type="hidden" name="role" value="' . $role . '" required>';
echo '</div>';
echo '<br />';
echo '';
echo '<input type="submit" value="Payer" name="addCot">';
echo '</form>';
echo '</div>';
echo '</div>';

if (!empty($_POST['addCot'])) {
    $date_cot = $_POST['date_cot'];
    $id = $_POST['id'];
    $montant = $_POST['montant'];
    $role = $_POST['role'];

    $addQuery = "INSERT INTO `cotiser` (`date_cotise`, `id`, `montant_cot`, `role_adh`) VALUES (?,?,?,?)";
    $result = $bdd->prepare($addQuery);
    $result->execute(array($date_cot, $id, $montant, $role));
}




//var_dump($header, $_SERVER);
