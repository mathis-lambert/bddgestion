<?php
include_once('include/head.php');
include_once('include/sidenav.php');
?>
<div class="container">
    <div class="content">
        <h1>Ajouter la table</h1>
        <form action="ajouterInfo.php" method="post" required>
            <label for="nom">Modifier le nom</label>
            <input type="text" name="nom" id="nom" required>
            <label for="firstname">Modifier le prénom</label>
            <input type="text" name="firstname" id="firstname" required>
            <label for="age">Modifier l'age</label>
            <input type="number" name="age" id="age" required>
            <label for="city">Modifier la ville</label>
            <input type="text" name="city" id="city" required>
            <label for="adresse">Modifier l'adresse</label>
            <input type="text" name="adresse" id="adresse" required>
            <label for="mail">Modifier le mail</label>
            <input type="text" name="mail" id="mail" required>

            <br>

            <button type="submit">Ajouter</button>
        </form>
        <?php
        require_once('controllers/core/dbConnect.php');

        if (!empty($_POST)) {
            $newName = $_POST['nom'];
            $newFirstName = $_POST['firstname'];
            $newAge = $_POST['age'];
            $newCity = $_POST['city'];
            $newAdresse = $_POST['adresse'];
            $newMail = $_POST['mail'];

            $updateQuery = "INSERT clients(clients.nom, clients.prenom, clients.age, clients.ville, clients.adresse, clients.mail) VALUES (?,?,?,?,?,?)";
            $result = $bdd->prepare($updateQuery);
            $result->execute(array($newName, $newFirstName, $newAge, $newCity, $newAdresse, $newMail));
        }

        require_once('controllers/afficheTable.php');
        ?>
    </div>
</div>
<?php
include_once('include/footer.php');
