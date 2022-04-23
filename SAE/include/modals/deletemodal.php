                <div class="delete-modal" id="delete-modal">
                    <div class="bg-modal" id="delete-bg-modal"></div>
                    <div class="delete-box">
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
                    </div>
                </div>