<?php
require_once('../../controllers/connect-database.php');
if (!empty($_POST)) {
    $deleteAllEmb = $bdd->prepare("DELETE FROM emprunt WHERE emprunt.imm_emb = '$imm_emb'");
    var_dump("je suis la", $deleteAllEmb);
    try {
        $deleteAllEmb->execute();
        header('location: https://neotica.ml-digital.fr/pages/nos-embarcations.php');
    } catch (PDOException $th) { ?>
        <div class="error-message">
            Une erreur inconnue s'est produite.
        </div>
<?php   }
} ?>