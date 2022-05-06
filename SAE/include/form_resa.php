<?php
require_once(dirname(__FILE__) . '/core/verifCot.php');
if ($_SESSION['isCot'] == true) {
    $returnedEmb = $bdd->prepare("SELECT embarcation.imm_emb FROM embarcation");
    $returnedEmb->execute();
    while ($array = $returnedEmb->fetch()) {
        $embArray[] = $array[0];
    }
    $returnedEmbLenght = count($embArray);
?>
    <form action="" method="post">
        <div class="d-flex column resa-form">
            <label for="date_emp">Date d'emprunt</label>
            <input type="datetime-local" name="date_emp" id="date_emp" required>

            <label for="immat_emb">Quelle embarcation ?</label>
            <select name="immat_emb" id="immat_emb" required>
                <?php if ($returnedEmb != false) {
                    for ($i = 0; $i < $returnedEmbLenght; $i++) {
                        echo "<option value='$embArray[$i]'>";
                        echo $embArray[$i];
                        echo "</option>";
                    }
                } else {
                    echo "<option value=''>";
                    echo "Il n'y a pas d'embarcation";
                    echo "</option>";
                } ?>"
            </select>

            <label for="date_ret">Date de retour</label>
            <input type="datetime-local" name="date_ret" id="date_ret" required>

            <label for="etat_av">Etat au moment de l'emprunt</label>
            <select name="etat_av" id="etat_av" required>
                <option value="">----- Choisissez un état -----</option>
                <option value="neuf">Neuf</option>
                <option value="t_bon">Très bon</option>
                <option value="bon">Bon</option>
                <option value="moyen">Moyen</option>
                <option value="Mauvais">Mauvais</option>
            </select>

            <input type="submit" value="Envoyer">
        </div>
    </form>
    <?php
    $id = $_SESSION['id'];
    $todayDate = date("Y-m-d");

    // obtenir la date du jour non concaténée sous forme d'entier
    $todayDay = date('d');
    $todayDay = intval($todayDay);

    $todayMonth = date('m');
    $todayMonth = intval($todayMonth);

    $todayYear = date('Y');
    $todayYear = intval($todayYear);

    $months30 = ['avril' => 4, 'juin' => 6, 'septembre' => 9, 'novembre' => 11];
    $months31 = ['janvier' => 1, 'mars' => 3, 'mai' => 5, 'juillet' => 7, 'aout' => 8, 'octobre' => 10];

    //obtenir la semaine d'après en réutilisant les variables précédente pour établir une intervalle
    if ($todayDay > 24 && $todayMonth == 12) {
        $newDay = $todayDay - 31 + 7;
        $newMonth = 1;
        $newYear = $todayYear + 1;
    } elseif ($todayDay > 20 && $todayMonth == 2) {
        $newDay = $todayDay - 27 + 7;
        $newMonth = $todayMonth + 1;
        $newYear = $todayYear;
    } elseif ($todayDay > 23 && in_array($todayMonth, $months30)) {
        $newDay = $todayDay - 30 + 7;
        $newMonth = $todayMonth + 1;
        $newYear = $todayYear;
    } elseif ($todayDay > 24 && in_array($todayMonth, $months31)) {
        $newDay = $todayDay - 31 + 7;
        $newMonth = $todayMonth + 1;
        $newYear = $todayYear;
    } else {
        $newDay = $todayDay + 7;
        $newMonth = $todayMonth;
        $newYear = $todayYear;
    }

    $newDate = $newYear . "-" . $newMonth . "-" . $newDay;

    $nbResaAdh = $bdd->prepare("SELECT COUNT(adherent.id) from adherent, emprunt where adherent.id = emprunt.id AND emprunt.id = '$id'");
    $nbResaSemaine = $bdd->prepare("SELECT COUNT(*) from adherent, emprunt where adherent.id = emprunt.id AND emprunt.id = '$id' AND emprunt.date_empr ");
    $nbResaAdh->execute();
    $nbResaAdhFetched = $nbResaAdh->fetch(PDO::FETCH_ASSOC);
    $nbResa = $nbResaAdhFetched['COUNT(adherent.id)'];
    $nbResa = intval($nbResa);
} else {
    ?>
    <div class="error-message">
        <h1>Vous n'avez pas effectué de cotisations au cours de la dernière année</h1>
        <br>
        <h2>Vous ne pourrez pas effectuer de réservations tant que vous n'avez pas cotisé !</h2>
        <a href="http://bdd.gestion/SAE/pages/paiement-cotisation.php">Cotiser</a>
    </div>
<?php
}
