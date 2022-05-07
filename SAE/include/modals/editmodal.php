<?php

if ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-donnees.php") {
    echo '<div class="edit-modal" id="edit-modal">';
    echo '<div class="bg-modal" id="edit-bg-modal"></div>';
    echo '<div class="edit-box">';
    echo '<form action="" method="post" required>';
    echo '<div class="d-flex modal-form">';
    echo '<input type="text" name="id" id="id" placeholder="id" required>';
    echo '<input type="text" name="password" id="password" placeholder="Mot de passe" required>';
    echo '<input type="number" name="droit" id="droit" placeholder="Droit" min="1" max="3" maxlength="1" required>';
    echo '<input type="text" name="nom" id="nom" placeholder="Nom" required>';
    echo '<input type="text" name="prenom" id="prenom" placeholder="Prénom" required>';
    echo '<input type="number" name="cp" id="cp" placeholder="Code Postal" required>';
    echo '<input type="text" name="ville" id="ville" placeholder="Ville" required>';
    echo '<input type="text" name="date_nais" id="date_nais" placeholder="Date de naissance *" required>';
    echo '<input type="number" name="tel" id="tel" placeholder="Télephone" maxlength="12" required>';
    echo '<input type="text" name="mail" id="mail" placeholder="Mail" required>';
    echo '<input type="text" name="activite" id="activite" placeholder="Activité" required>';
    echo '<input type="text" name="date_crea_carte" id="date_crea_carte" placeholder="Date de création *" required>';
    echo '<input type="text" name="date_deliv_carte" id="date_deliv_carte" placeholder="Date de délivrance carte *" required>';
    echo '<input type="text" name="date_expi_carte" id="date_expi_carte" placeholder="Date expiration carte *" required>';
    echo '</div>';
    echo '<br />';
    echo '';
    echo '<button type="submit" name="add">Ajouter</button>';
    echo '<br />';
    echo '<pre>* les dates doivent être au format (aaaa-mm-jj)</pre>';
    echo '</form>';
    echo '</div>';
    echo '</div>';

    if (!empty($_POST['add'])) {
        $id = $_POST['id'];
        $mdp = md5($_POST['password']);
        $droit = $_POST['droit'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $date_nais = $_POST['date_nais'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $activite = $_POST['activite'];
        $date_crea_carte = $_POST['date_crea_carte'];
        $date_deliv_carte = $_POST['date_deliv_carte'];
        $date_expi_carte = $_POST['date_expi_carte'];

        $addQuery = "INSERT INTO `adherent` (`id`, `mot_de_passe`, `droit`, `nom_adh`, `pre_adh`, `cp_adh`, `ville_adh`, `date_nais_adh`, `tel_adh`, `email_adh`, `activ_adh`, `date_crea_carte_adh`, `immat_adh`, `date_deliv_carte_adh`, `date_exp_carte_adh`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $bdd->prepare($addQuery);
        $result->execute(array($id, $mdp, $droit, $nom, $prenom, $cp, $ville, $date_nais, $tel, $mail, $activite, $date_crea_carte, $date_deliv_carte, $date_expi_carte));
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-cotisations.php") {
    echo '<div class="edit-modal" id="edit-modal">';
    echo '<div class="bg-modal" id="edit-bg-modal"></div>';
    echo '<div class="edit-box">';
    echo '<form action="" method="post" required>';
    echo '<div class="d-flex modal-form">';
    echo '<input type="text" name="date_cot" id="date_cot" placeholder="Date de cotisation" required>';
    echo '<select name="id" id="id" required>';
    for ($i = 0; $i < $arrayMaxLenght; $i++) {
        echo "<option value='$countArray[$i]'>";
        echo $countArray[$i];
        echo "</option>";
    }
    echo '</select>';
    echo '<input type="number" name="montant" id="montant" placeholder="Montant (€)" required>';
    /*     echo '<input type="text" name="role" id="role" placeholder="Rôle" required>'; */
    echo '<select name="role" placeholder="Rôle" value="rôle" required>';
    echo '<option value=""> -- Choisir un rôle -- </option>';
    echo '<option value="Administrateur"> Administrateur</option>';
    echo '<option value="Adhérent"> Adhérent</option>';
    echo '<option value="Plagiste"> Plagiste</option>';
    echo '</select>';
    echo '</div>';
    echo '<br />';
    echo '';
    echo '<input type="submit" name="addCot">Ajouter</input>';
    echo '<br />';
    echo '<pre>* les dates doivent être au format (aaaa-mm-jj)</pre>';
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
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-reservations.php") {
    $returnedEmb = $bdd->prepare("SELECT embarcation.imm_emb FROM embarcation");
    $returnedEmb->execute();
    while ($array = $returnedEmb->fetch()) {
        $embArray[] = $array[0];
    }
    $returnedEmbLenght = count($embArray);
    echo '<div class="edit-modal" id="edit-modal">';
    echo '<div class="bg-modal" id="edit-bg-modal"></div>';
    echo '<div class="edit-box">';
    echo '<form action="" method="post" required>';
    echo '<div class="d-flex modal-form">';
    echo '<select name="id" id="id" required>';
    for ($i = 0; $i < $arrayMaxLenght; $i++) {
        echo "<option value='$countArray[$i]'>";
        echo $countArray[$i];
        echo "</option>";
    }
    echo '</select>';
    echo '<input type="datetime-local" name="date_empr" id="date_empr" placeholder="Date de l emprunt" required>';
    echo '<select name="immat_emb" id="immat_emb" required>';
    if ($returnedEmb != false) {
        for ($i = 0; $i < $returnedEmbLenght; $i++) {
            echo "<option value='$embArray[$i]'>";
            echo $embArray[$i];
            echo "</option>";
        }
    } else {
        echo "<option value=''>";
        echo "Il n'y a pas d'embarcation";
        echo "</option>";
    }
    echo '</select>';
    echo '<input type="datetime-local" name="date_ret" id="date_ret" placeholder="Date de retour" required>';
    echo '<select name="etat_av" id="etat_av" required>';
    echo '<option value="">----- Etat au début -----</option>';
    echo '<option value="neuf">Neuf</option>';
    echo '<option value="t_bon">Très bon</option>';
    echo '<option value="bon">Bon</option>';
    echo '<option value="moyen">Moyen</option>';
    echo '<option value="Mauvais">Mauvais</option>';
    echo '</select>';
    echo '<select name="etat_ap" id="etat_ap" required>';
    echo '<option value="">----- Etat de retour -----</option>';
    echo '<option value="neuf">Neuf</option>';
    echo '<option value="t_bon">Très bon</option>';
    echo '<option value="bon">Bon</option>';
    echo '<option value="moyen">Moyen</option>';
    echo '<option value="Mauvais">Mauvais</option>';
    echo '</select>';
    echo '</div>';
    echo '<br />';
    echo '<input type="submit" name="editEmpr" value="Ajouter">';
    echo '</form>';
    echo '</div>';
    echo '</div>';

    if (!empty($_POST['editEmpr'])) {
        $id = $_POST['id'];
        $date_emprunt =
            date("Y-m-d H:i:s", strtotime($_POST['date_empr']));

        $immat_emb = $_POST['immat_emb'];

        $date_retour =
            date("Y-m-d H:i:s", strtotime($_POST['date_ret']));

        $etat = $_POST['etat_av'];
        $etat_ap = $_POST['etat_ap'];

        $addQuery = "INSERT INTO `emprunt` (`id`, `date_empr`, `imm_emb`, `date_retour_empr`, `etat_retour_empr`, `etat_debut_empr`) VALUES (?,?,?,?,?,?)";
        $result = $bdd->prepare($addQuery);
        $result->execute(array($id, $date_emprunt, $immat_emb, $date_retour, $etat_ap, $etat));
    }
}



//var_dump($header, $_SERVER);
