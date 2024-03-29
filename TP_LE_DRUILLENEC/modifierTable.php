<?php
include_once('include/head.php');
include_once('include/sidenav.php');
?>
<div class="container">
    <div class="content">
        <h1>Modifier la table</h1>
        <?php
        require_once('controllers/core/dbConnect.php');

        $countreq =  $bdd->prepare("SELECT clients.id FROM clients");
        $countreq->execute();
        while ($count = $countreq->fetch()) {
            $countArray[] = $count[0];
        }
        $arrayMaxLenght = count($countArray);
        ?>
        <form action="modifierTable.php" method="post">
            <br>
            <label for="id">Choisissez un identifiant :</label>
            <select name="id" id="id" required>
                <?php
                for ($i = 0; $i < $arrayMaxLenght; $i++) {
                    echo "<option value='$countArray[$i]'>";
                    echo $countArray[$i];
                    echo "</option>";
                }
                ?>
            </select>
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

            <button type="submit">Modifier</button>
        </form>
        <?php
        if (!empty($_POST)) {
            $newName = $_POST['nom'];
            $newFirstName = $_POST['firstname'];
            $newAge = $_POST['age'];
            $newCity = $_POST['city'];
            $newAdresse = $_POST['adresse'];
            $newMail = $_POST['mail'];

            $ID = $_POST['id'];

            $updateQuery = "UPDATE clients SET clients.Nom = ?, clients.Prenom = ?, clients.age = ?, clients.Ville = ?, clients.adresse = ?, clients.mail = ? WHERE clients.id = ?";
            $result = $bdd->prepare($updateQuery);
            $result->execute(array($newName, $newFirstName, $newAge, $newCity, $newAdresse, $newMail, $ID));
        }

        require_once('controllers/afficheTable.php');
        ?>
    </div>
</div>

<?php
include_once('include/footer.php');
