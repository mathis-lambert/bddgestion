<?php

$query = 'SELECT * FROM `cotiser`;';
$result = $bdd->query($query);
echo "<h2>Contenu de la table COTISER:</h2></br>";
echo "<table border=\"1\">";
echo "<tr><th>Date cotisation</th> <th>Id</th> <th>Montant (€)</th> <th>Role</th></tr>";
while ($ligne = $result->fetch()) {
    echo "<tr>";
    echo "<td> " . $ligne['date_cotise'] . "</td>";
    echo "<td> " . $ligne['id'] . "</td>";
    echo "<td> " . $ligne['montant_cot'] . "€ " .  "</td>";
    echo "<td> " . $ligne['role_adh'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</br></br>";
echo "<br/> Nbre de résultats : " . $result->rowCount() . "<br/>";
$result->closeCursor();
