<?php

if ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-donnees.php") {

    $formvalid = isset($_POST['idSelect']); ?>

    <?php if (!$formvalid) { ?>
        <div class="modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <form action="" id="pre-form" onsubmit="keepModal()" method="post">
                    <div class="d-flex modal-form">
                        <div class="input-box">
                            <label for="id">Choisissez un ID :</label>
                            <select name="id" id="id" required>
                                <?php
                                for ($i = 0; $i < $arrayMaxLenght; $i++) {
                                    echo "<option value='$countArray[$i]'>";
                                    echo $countArray[$i];
                                    echo "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="idSelect" id="select_button" value="Choisir">
                </form>
            </div>
        </div>

    <?php } else if (empty($_POST['edit-adh'])) {
        var_dump($_POST['id']);
        $id = $_POST['id'];
        $adh_info_query = $bdd->prepare("SELECT * FROM adherent WHERE adherent.id = '$id'");
        $adh_info_query->execute();
        $adh_info = $adh_info_query->fetch(PDO::FETCH_NAMED);
    ?>
        <div class="active modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <div class="center pb-1">
                    <b> vous modifiez l'id : <?php echo $_POST['id']; ?></b>
                    <br />
                </div>
                <form action="" method="post" required>
                    <div class="d-flex modal-form">
                        <!-- php var_dump($adh_info); ?-->
                        <div class="input-box">
                            <label for="id">Identifiant :</label>
                            <input type="text" name="id" id="id" value="<?php echo $adh_info["id"] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="password">Mot de passe :</label>
                            <input type="text" name="password" id="password" value="<?php echo $adh_info['mot_de_passe'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" value="<?php echo $adh_info['nom_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" id="prenom" value="<?php echo $adh_info['pre_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="droit">Droit :</label>
                            <input type="number" name="droit" id="droit" value="<?php echo $adh_info["droit"] ?>" min="1" max="3" maxlength="1" required>
                        </div>
                        <div class="input-box">
                            <label for="cp">Code postal :</label>
                            <input type="number" name="cp" id="cp" value="<?php echo $adh_info['cp_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="ville">Ville :</label>
                            <input type="text" name="ville" id="ville" value="<?php echo $adh_info['ville_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="date_nais">Date de naissance :</label>
                            <input type="date" name="date_nais" id="date_nais" value="<?php echo $adh_info['date_nais_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="tel">Téléphone :</label>
                            <input type="number" name="tel" id="tel" value="<?php echo $adh_info['tel_adh'] ?>" maxlength="12" required>
                        </div>
                        <div class="input-box">
                            <label for="mail">E-Mail :</label>
                            <input type="text" name="mail" id="mail" value="<?php echo $adh_info['email_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="activite">Activité :</label>
                            <input type="text" name="activite" id="activite" value="<?php echo $adh_info['activ_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="date_crea_adh">Date d'inscription :</label>
                            <input type="date" name="date_crea_adh" id="date_crea_adh" value="<?php echo $adh_info['date_crea_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="date_deliv_carte">Date de délivrance carte :</label>
                            <input type="date" name="date_deliv_carte" id="date_deliv_carte" value="<?php echo $adh_info['date_deliv_carte_adh'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="date_expi_carte">Date d'expiration carte :</label>
                            <input type="date" name="date_expi_carte" id="date_expi_carte" value="<?php echo $adh_info['date_exp_carte_adh'] ?>" required>
                        </div>
                    </div>
                    <br />

                    <input type="submit" name="edit-adh" value="Modifier">
                    <br />
                    <pre>* les dates doivent être au format (aaaa-mm-jj)</pre>
                </form>
            </div>
        </div>

    <?php
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
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-cotisations.php") { ?>
    <div class="modal" id="modal">
        <div class="bg-modal" id="bg-modal"></div>
        <div class="edit-box">
            <form action="" method="post" required>
                <div class="d-flex modal-form">
                    <input type="text" name="date_cot" id="date_cot" value="Date de cotisation" required>
                    <select name="id" id="id" required>
                        <?php
                        for ($i = 0; $i < $arrayMaxLenght; $i++) {
                            echo "<option value='$countArray[$i]'>";
                            echo $countArray[$i];
                            echo "</option>";
                        }
                        ?>
                    </select>
                    <input type="number" name="montant" id="montant" value="Montant (€)" required>
                    /* <input type="text" name="role" id="role" value="Rôle" required> */
                    <select name="role" value="Rôle" value="rôle" required>
                        <option value=""> -- Choisir un rôle -- </option>
                        <option value="Administrateur"> Administrateur</option>
                        <option value="Adhérent"> Adhérent</option>
                        <option value="Plagiste"> Plagiste</option>
                    </select>
                </div>
                <br />

                <input type="submit" name="addCot" value="Modifier">
                <br />
                <pre>* les dates doivent être au format (aaaa-mm-jj)</pre>
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
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-reservations.php") {
    $returnedEmb = $bdd->prepare("SELECT embarcation.imm_emb FROM embarcation");
    $returnedEmb->execute();
    while ($array = $returnedEmb->fetch()) {
        $embArray[] = $array[0];
    }
    $returnedEmbLenght = count($embArray);
    echo '<div class="modal" id="modal">';
    echo '<div class="bg-modal" id="bg-modal"></div>';
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
    echo '<input type="datetime-local" name="date_empr" id="date_empr" value="Date de l emprunt" required>';
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
    echo '<input type="datetime-local" name="date_ret" id="date_ret" value="Date de retour" required>';
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
    echo '<input type="submit" name="editEmpr" value="Modifier">';
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
