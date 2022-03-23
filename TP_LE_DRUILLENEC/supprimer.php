<?php
include_once('include/head.php');
include_once('include/sidenav.php');
?>
<div class="container">
    <div class="content">
        <h1>Supprimer une ligne</h1>
        <?php
        require_once('controllers/core/dbConnect.php');

        $countreq =  $bdd->prepare("SELECT clients.id FROM clients");
        $countreq->execute();
        while ($count = $countreq->fetch()) {
            $countArray[] = $count[0];
        }
        $arrayMaxLenght = count($countArray);
        ?>
        <form action="supprimer.php" method="post">
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
            <br>
            <button type="submit">Supprimer</button>
        </form>
        <?php
        if (!empty($_POST)) {
            $selectedValue = $_POST['id'];

            $deleteQuery = "DELETE FROM clients WHERE clients.id = ?";
            $result = $bdd->prepare($deleteQuery);
            $result->execute(array($selectedValue));
        }

        require_once('controllers/afficheTable.php');
        ?>
    </div>
</div>
<?php
include_once('include/footer.php');
