<?php
include('connexionBD.php');
// FOrmulaire d'ajout
$requete_tables = "SHOW TABLES";
$resultat_tables = $connectionProjetIntegration->query($requete_tables);

if ($resultat_tables->num_rows > 0) {
    echo "<h2>Tables dans la base de données :</h2>";
    echo "<table border='1'>";
    while ($row = $resultat_tables->fetch_array()) {
        $table_name = $row[0];
        $requete_contenu_table = "SELECT * FROM $table_name";
        $resultat_contenu_table = $connectionProjetIntegration->query($requete_contenu_table);
        if ($resultat_contenu_table->num_rows > 0) {
            echo "<tr><td>$table_name</td></tr>";

            while ($row = $resultat_contenu_table->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td style='width: 1000px;'>$value</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td>Aucune donnée trouvée dans la table $table_name.</td></tr>";
        }
    }
    echo "</table>";
    echo '<a href="ModifyBD.html" class="btn btn-primary">Modify</a>';
} else {
    echo "Aucune table trouvée dans la base de données.";
}

$connectionProjetIntegration->close();
