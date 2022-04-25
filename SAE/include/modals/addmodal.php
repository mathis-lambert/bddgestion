<?php

if ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-donnees.php") {
    echo '<div class="add-modal" id="add-modal">';
    echo '<div class="bg-modal" id="add-bg-modal"></div>';
    echo '<div class="add-box">';
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
    echo '<input type="text" name="immat" id="immat" placeholder="immatriculation" required>';
    echo '<input type="text" name="date_deliv_carte" id="date_deliv_carte" placeholder="Date de délivrance carte *" required>';
    echo '<input type="text" name="date_expi_carte" id="date_expi_carte" placeholder="Date expiration carte *" required>';
    echo '</div>';
    echo '<br />';
    echo '';
    echo '<button type="submit">Ajouter</button>';
    echo '<br />';
    echo '<pre>* les dates doivent être au format (aaaa-mm-jj)</pre>';
    echo '</form>';
    echo '</div>';
    echo '</div>';

    if (!empty($_POST)) {
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
        $immat = $_POST['immat'];
        $date_deliv_carte = $_POST['date_deliv_carte'];
        $date_expi_carte = $_POST['date_expi_carte'];

        $addQuery = "INSERT INTO `adherent` (`id`, `mot_de_passe`, `droit`, `nom_adh`, `pre_adh`, `cp_adh`, `ville_adh`, `date_nais_adh`, `tel_adh`, `email_adh`, `activ_adh`, `date_crea_carte_adh`, `immat_adh`, `date_deliv_carte_adh`, `date_exp_carte_adh`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $bdd->prepare($addQuery);
        $result->execute(array($id, $mdp, $droit, $nom, $prenom, $cp, $ville, $date_nais, $tel, $mail, $activite, $date_crea_carte, $immat, $date_deliv_carte, $date_expi_carte));
    }
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-cotisations.php") {
    echo '<div class="add-modal" id="add-modal">';
    echo '<div class="bg-modal" id="add-bg-modal"></div>';
    echo '<div class="add-box">';
    echo '<form action="" method="post" required>';
    echo '<div class="d-flex modal-form">';
    echo '<input type="text" name="date_cot" id="date_cot" placeholder="Date de cotisation" required>';
    echo '<input type="text" name="id" id="id" placeholder="id" required>';
    echo '<input type="number" name="montant" id="montant" placeholder="Montant (€)" required>';
    echo '<input type="text" name="role" id="role" placeholder="Rôle" required>';
    echo '</div>';
    echo '<br />';
    echo '';
    echo '<button type="submit">Ajouter</button>';
    echo '<br />';
    echo '<pre>* les dates doivent être au format (aaaa-mm-jj)</pre>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
} elseif ($_SERVER['PHP_SELF'] == "/SAE/pages/gestion-des-reservations.php") {
    echo '<div class="add-modal" id="add-modal">';
    echo '<div class="bg-modal" id="add-bg-modal"></div>';
    echo '<div class="add-box">';
    echo '<form action="" method="post" required>';
    echo '<div class="d-flex modal-form">';
    echo '<input type="text" name="id" id="id" placeholder="id" required>';
    echo '<input type="datetime-local" name="date_empr" id="date_empr" placeholder="Date de l emprunt" required>';
    echo '<input type="text" name="immat_embarc" id="immat_embarc" placeholder="Immatriculation embarcation" required>';
    echo '<input type="datetime-local" name="date_ret" id="date_ret" placeholder="Date de retour" required>';
    echo '<input type="text" name="etat_av" id="etat_av" placeholder="Etat avant" required>';
    echo '<input type="text" name="etat_ap" id="etat_ap" placeholder="Etat après" >';
    echo '</div>';
    echo '<br />';
    echo '';
    echo '<button type="submit">Ajouter</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}



//var_dump($header, $_SERVER);
