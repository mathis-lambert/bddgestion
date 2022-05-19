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
                            <label for="id">Choisissez un ID à modifier :</label>
                            <select name="id" id="id" required>
                                <?php
                                var_dump($countArray);
                                if ($countArray != false) {
                                    for ($i = 0; $i < $arrayMaxLenght; $i++) {
                                        echo "<option value='$countArray[$i]'>";
                                        echo $countArray[$i];
                                        echo "</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="idSelect" id="select_button" value="Choisir">
                </form>
            </div>
        </div>

    <?php } else if (empty($_POST['edit-adh'])) {
        /* var_dump($_POST['id']); */
        $old_id = $_POST['id'];
        $adh_info_query = $bdd->prepare("SELECT * FROM adherent WHERE adherent.id = '$old_id'");
        $adh_info_query->execute();
        $adh_info = $adh_info_query->fetch(PDO::FETCH_NAMED);
    ?>
        <div class="active modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <div class="center pb-1">
                    <b> vous modifiez l'id : <?php echo $old_id; ?></b>
                    <br />
                </div>
                <form action="" method="post" required>
                    <div class="d-flex modal-form">
                        <!-- php var_dump($adh_info); ?-->
                        <input type="hidden" name="old_id" value="<?php echo $old_id; ?>">
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
    }
    if (!empty($_POST['edit-adh'])) {
        //variables du formulaire edit_adh
        $old_id = $_POST['old_id'];
        $id = $_POST['id'];
        $mdp = $_POST['password'];
        $droit = $_POST['droit'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $date_nais = $_POST['date_nais'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $activite = $_POST['activite'];
        $date_crea_adh = $_POST['date_crea_adh'];
        $date_deliv_carte = $_POST['date_deliv_carte'];
        $date_expi_carte = $_POST['date_expi_carte'];

        $editAdh = $bdd->prepare("UPDATE `adherent` SET `id` = '$id', `mot_de_passe`='$mdp' , `droit`= $droit , `nom_adh` = '$nom', `pre_adh`= '$prenom', `cp_adh` = '$cp', `ville_adh`='$ville', `date_nais_adh`='$date_nais', `tel_adh`='$tel', `email_adh`='$mail', `activ_adh`='$activite', `date_crea_adh`='$date_crea_adh', `date_deliv_carte_adh`='$date_deliv_carte', `date_exp_carte_adh`='$date_expi_carte' WHERE adherent.id = '$old_id'");
        /* var_dump($editAdh); */
        try {
            $editAdh->execute();
        } catch (PDOException $th) {
        ?>
            <div class="error-message">
                Une erreur s'est produite veuillez réessayer
            </div>
        <?php
        }
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-cotisations.php") {

    $idSelected = isset($_POST['idSelect']);


    if (!$idSelected) { ?>
        <div class="modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <form action="" id="pre-form" method="post">
                    <div class="d-flex modal-form">
                        <div class="input-box">
                            <label for="id">Choisissez un ID :</label>
                            <select name="id" id="id" required>
                                <?php
                                var_dump($countArray);
                                if ($countArray != false) {
                                    for ($i = 0; $i < $arrayMaxLenght; $i++) {
                                        echo "<option value='$countArray[$i]'>";
                                        echo $countArray[$i];
                                        echo "</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="idSelect" id="select_button" value="Choisir">
                </form>
            </div>
        </div>

    <?php } else if ($idSelected && empty($_POST['dateSelect'])) {
        $old_id = $_POST['id'];

        $dateFromId = $bdd->prepare("SELECT cotiser.date_cotise FROM cotiser WHERE cotiser.id = '$old_id'");
        try {
            $dateFromId->execute();
        } catch (PDOException $th) {
            echo '<div class="error-message">';
            echo 'Une erreur inconnue s\'est produite';
            echo '</div>';
        }
        while ($dateCot = $dateFromId->fetch()) {
            $dateCotResult[] = $dateCot[0];
        }
        if (!empty($dateCotResult)) {
            $lenDateCot = count($dateCotResult);
        }

    ?> <div class="active modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <form action="" id="pre-form" method="post">
                    <div class="d-flex modal-form">
                        <div class="input-box">
                            <input type="hidden" name="old_id" value="<?php echo $old_id; ?>">
                            <label for="date_cot">Choisissez une date de cotisation :</label>
                            <select name="date_cot" id="date_cot" required>
                                <?php

                                if ($lenDateCot != 0) {
                                    for ($i = 0; $i < $lenDateCot; $i++) {
                                        echo "<option value='$dateCotResult[$i]'>";
                                        echo $dateCotResult[$i];
                                        echo "</option>";
                                    }
                                } else {
                                    echo "<option value=''>";
                                    echo 'il \'a pas de cotisations pour cet ID';
                                    echo "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="dateSelect" id="select_button" value="Choisir">
                </form>
            </div>
        </div>
    <?php
    }
    if (isset($_POST['dateSelect'])) {
        /* var_dump($_POST['id']); */
        $old_id = $_POST['old_id'];
        $old_date = $_POST['date_cot'];
        $cot_info_query = $bdd->prepare("SELECT * FROM cotiser WHERE cotiser.id = '$old_id'");
        $cot_info_query->execute();
        $cot_info = $cot_info_query->fetch(PDO::FETCH_NAMED);
    ?>
        <div class="active modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <div class="center pb-1">
                    <b> vous modifiez la cotisation de : <?php echo $old_id; ?></b>
                    <br />
                </div>
                <form action="" method="post" required>
                    <div class="d-flex modal-form">
                        <!-- php var_dump($adh_info); ?-->
                        <input type="hidden" name="old_id" value="<?php echo $old_id; ?>">
                        <input type="hidden" name="old_date" value="<?php echo $old_date; ?>">
                        <div class="input-box">
                            <label for="date">Date de cotisation :</label>
                            <input type="date" name="date" id="date" value="<?php echo $cot_info["date_cotise"] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="id">Identifiant :</label>
                            <input type="text" name="id_cot" id="id" value="<?php echo $cot_info['id'] ?>" required readonly>
                        </div>
                        <div class="input-box">
                            <label for="montant">Montant de la cotisation :</label>
                            <input type="number" name="montant" id="montant" value="<?php echo $cot_info['montant_cot'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="role">Rôle :</label>
                            <input type="text" name="role" id="role" value="<?php echo $cot_info['role_adh'] ?>" required>
                        </div>
                    </div>
                    <br />

                    <input type="submit" name="edit_cot" value="Modifier">
                </form>
            </div>
        </div>
        <?php
    }
    if (!empty($_POST['edit_cot'])) {
        //variables du formulaire edit_cot
        $old_id = $_POST['old_id'];
        $old_date = $_POST['old_date'];
        $date_cot = $_POST['date'];
        $id_cot = $_POST['id_cot'];
        $montant = $_POST['montant'];
        $role = $_POST['role'];

        $editCot = $bdd->prepare("UPDATE `cotiser` SET `date_cotise` = '$date_cot', `id`='$id_cot' , `montant_cot`= $montant , `role_adh` = '$role' WHERE cotiser.id = '$old_id' AND cotiser.date_cotise = '$old_date'");
        try {
            $editCot->execute();
        } catch (PDOException $th) {
        ?>
            <div class="error-message">
                Une erreur s'est produite veuillez réessayer
            </div>
        <?php
        }
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-reservations.php") {
    $idSelected = isset($_POST['idSelect']);


    if (!$idSelected) { ?>
        <div class="modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <form action="" id="pre-form" method="post">
                    <div class="d-flex modal-form">
                        <div class="input-box">
                            <label for="id">Choisissez un ID :</label>
                            <select name="id" id="id" required>
                                <?php
                                var_dump($countArray);
                                if ($countArray != false) {
                                    for ($i = 0; $i < $arrayMaxLenght; $i++) {
                                        echo "<option value='$countArray[$i]'>";
                                        echo $countArray[$i];
                                        echo "</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="idSelect" id="select_button" value="Choisir">
                </form>
            </div>
        </div>

    <?php } else if ($idSelected && empty($_POST['dateSelect'])) {
        $old_id = $_POST['id'];

        $dateFromId = $bdd->prepare("SELECT emprunt.date_empr FROM emprunt WHERE emprunt.id = '$old_id'");
        try {
            $dateFromId->execute();
        } catch (PDOException $th) {
            echo '<div class="error-message">';
            echo 'Une erreur inconnue s\'est produite';
            echo '</div>';
        }
        while ($dateEmpr = $dateFromId->fetch()) {
            $dateEmprResult[] = $dateEmpr[0];
        }
        if (!empty($dateEmprResult)) {
            $lenDateEmpr = count($dateEmprResult);
        }

    ?> <div class="active modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <form action="" id="pre-form" method="post">
                    <div class="d-flex modal-form">
                        <div class="input-box">
                            <input type="hidden" name="old_id" value="<?php echo $old_id; ?>">
                            <label for="date_empr">Choisissez une date de réservation :</label>
                            <select name="date_empr" id="date_empr" required>
                                <?php

                                if ($lenDateEmpr != 0) {
                                    for ($i = 0; $i < $lenDateEmpr; $i++) {
                                        echo "<option value='$dateEmprResult[$i]'>";
                                        echo $dateEmprResult[$i];
                                        echo "</option>";
                                    }
                                } else {
                                    echo "<option value=''>";
                                    echo 'il \'a pas de réservations pour cet ID';
                                    echo "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="dateSelect" id="select_button" value="Choisir">
                </form>
            </div>
        </div>
    <?php
    }
    if (isset($_POST['dateSelect'])) {
        /* var_dump($_POST['id']); */
        $old_id = $_POST['old_id'];
        $old_date = $_POST['date_empr'];
        $empr_info_query = $bdd->prepare("SELECT * FROM emprunt WHERE emprunt.id = '$old_id'");
        $empr_info_query->execute();
        $empr_info = $empr_info_query->fetch(PDO::FETCH_NAMED);
    ?>
        <div class="active modal" id="modal">
            <div class="bg-modal" id="bg-modal"></div>
            <div class="edit-box">
                <div class="center pb-1">
                    <b> vous modifiez la cotisation de : <?php echo $old_id; ?></b>
                    <br />
                </div>
                <form action="" method="post" required>
                    <div class="d-flex modal-form">
                        <!-- php var_dump($adh_info); ?-->
                        <input type="hidden" name="old_id" value="<?php echo $old_id; ?>">
                        <input type="hidden" name="old_date" value="<?php echo $old_date; ?>">
                        <div class="input-box">
                            <label for="id">Identifiant :</label>
                            <input type="text" name="id_cot" id="id" value="<?php echo $empr_info['id'] ?>" required readonly>
                        </div>
                        <div class="input-box">
                            <label for="date_empr">Date de réservation :</label>
                            <input type="text" name="date_empr" id="date_empr" value="<?php echo $empr_info["date_empr"] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="immat">Immatriculation de l'embarcation :</label>
                            <input type="text" name="immat" id="immat" value="<?php echo $empr_info['imm_emb'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="date_ret">Date de retour de l'emprunt :</label>
                            <input type="text" name="date_ret" id="date_ret" value="<?php echo $empr_info['date_retour_empr'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="etat_av">Etat avant :</label>
                            <input type="text" name="etat_av" id="etat_av" value="<?php echo $empr_info['etat_debut_empr'] ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="etat_ret">Etat après retour :</label>
                            <input type="text" name="etat_ret" id="etat_ret" value="<?php echo $empr_info['etat_retour_empr'] ?>" required>
                        </div>
                    </div>
                    <br />

                    <input type="submit" name="edit_cot" value="Modifier">
                </form>
            </div>
        </div>
        <?php
    }
    if (!empty($_POST['edit_cot'])) {
        //variables du formulaire edit_cot
        $old_id = $_POST['old_id'];
        $old_date = $_POST['old_date'];
        $date_cot = $_POST['date'];
        $id_cot = $_POST['id_cot'];
        $montant = $_POST['montant'];
        $role = $_POST['role'];

        $editCot = $bdd->prepare("UPDATE `cotiser` SET `date_cotise` = '$date_cot', `id`='$id_cot' , `montant_cot`= $montant , `role_adh` = '$role' WHERE cotiser.id = '$old_id' AND cotiser.date_cotise = '$old_date'");
        try {
            $editCot->execute();
        } catch (PDOException $th) {
        ?>
            <div class="error-message">
                Une erreur s'est produite veuillez réessayer
            </div>
    <?php
        }
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/nos-embarcations.php") { ?>
    <div class="modal" id="modal">
        <div class="bg-modal" id="bg-modal"></div>
        <div class="add-box">
            <form action="" method="post" required>
                <div class="d-flex modal-form">
                    <input type="text" name="date_cot" id="date_cot" placeholder="Date de cotisation" required>
                    <select name="id" id="id" required>

                        <?php
                        for ($i = 0; $i < $arrayMaxLenght; $i++) {
                            echo "<option value='$countArray[$i]'>";
                            echo $countArray[$i];
                            echo "</option>";
                        } ?>
                    </select>
                    <input type="number" name="montant" id="montant" placeholder="Montant (€)" required>
                    <input type="text" name="role" id="role" placeholder="Rôle" required>
                    <select name="role" placeholder="Rôle" value="rôle" required>
                        <option value=""> -- Choisir un rôle -- </option>
                        <option value="Administrateur"> Administrateur</option>
                        <option value="Adhérent"> Adhérent</option>
                        <option value="Plagiste"> Plagiste</option>
                    </select>
                </div>
                <br />

                <input type="submit" name="addCot" value="Ajouter">
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
}




//var_dump($header, $_SERVER);
