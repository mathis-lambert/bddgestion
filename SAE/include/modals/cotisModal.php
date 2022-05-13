<?php
$id = $_SESSION['id'];
$role = $_SESSION['role'];
?>

<div class="modal" id="modal">
    <div class="bg-modal" id="bg-modal"></div>
    <div class="cotis-box">
        <form action="" method="post">
            <div class="d-flex modal-form">
                <input type="hidden" name="date_cot" value="<?php echo date(" Y-m-d") ?>" required>
                <input type="hidden" name="id" value="<?php echo $id ?>" required>
                <input type="number" name="montant" placeholder="Montant (€)" min="70" required>
                <input type="hidden" name="role" value="<?php echo $role ?>" required>
            </div><br /><input type="submit" value="Payer" name="addCot">
        </form>
    </div>
</div>

<?php
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
