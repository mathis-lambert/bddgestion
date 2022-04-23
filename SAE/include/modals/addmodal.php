<div class="add-modal" id="add-modal">
    <div class="bg-modal" id="add-bg-modal"></div>
    <div class="add-box">
        <form action="ajouterInfo.php" method="post" required>
            <label for="nom">nom</label>
            <input type="text" name="nom" id="nom" required>
            <br>
            <label for="firstname"> prénom</label>
            <input type="text" name="firstname" id="firstname" required>
            <br>
            <label for="age">age</label>
            <input type="number" name="age" id="age" required>
            <br>
            <label for="city">ville</label>
            <input type="text" name="city" id="city" required>
            <br>
            <label for="adresse">adresse</label>
            <input type="text" name="adresse" id="adresse" required>
            <br>
            <label for="mail">mail</label>
            <input type="text" name="mail" id="mail" required>

            <br>

            <button type="submit">Ajouter</button>
        </form>
    </div>
</div>