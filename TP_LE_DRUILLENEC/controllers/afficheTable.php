<?php
require_once("controllers/core/dbConnect.php");

$query = 'SELECT * FROM `clients`;';
$result = $bdd->query($query);
echo "<h2>Contenu de ma table :</h2></br>";
echo "<table border=\"1\">";
echo "<tr><th>Id</th> <th>Nom</th> <th>Prenom</th> <th>Age</th> <th>Ville</th><th>Adresse</th> <th>Mail</th></tr>";
while ($ligne = $result->fetch()) {
    echo "<tr>";
    echo "<td> " . $ligne['id'] . "</td>";
    echo "<td> " . $ligne['Nom'] . "</td>";
    echo "<td> " . $ligne['Prenom'] . "</td>";
    echo "<td> " . $ligne['Age'] . "</td>";
    echo "<td> " . $ligne['Ville'] . "</td>";
    echo "<td> " . $ligne['Adresse'] . "</td>";
    echo "<td> " . $ligne['Mail'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</br></br>";
echo "<br/> Nbre de résultats : " . $result->rowCount() . "<br/>";
$result->closeCursor();
