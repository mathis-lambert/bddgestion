<div class="edit-modal" id="edit-modal">
    <div class="bg-modal" id="edit-bg-modal"></div>
    <div class="edit-box">
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
            <br>
            <label for="nom">Modifier le nom</label>
            <input type="text" name="nom" id="nom" required>
            <br>
            <label for="firstname">Modifier le prénom</label>
            <input type="text" name="firstname" id="firstname" required>
            <br>
            <label for="age">Modifier l'age</label>
            <input type="number" name="age" id="age" required>
            <br>
            <label for="city">Modifier la ville</label>
            <input type="text" name="city" id="city" required>
            <br>
            <label for="adresse">Modifier l'adresse</label>
            <input type="text" name="adresse" id="adresse" required>
            <br>
            <label for="mail">Modifier le mail</label>
            <input type="text" name="mail" id="mail" required>
            <br>

            <br>

            <button type="submit">Modifier</button>
        </form>
    </div>
</div>