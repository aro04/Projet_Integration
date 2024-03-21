
<?php
include('navigation.html');
$result = $connectionProjetIntegration->query("SELECT * FROM livres");
function truncateText($text, $limit)
{
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . '...';
    }
    return $text;
}
if ($result) {
    // Affichage des produits
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-sm-6 col-md-3">';
        echo '<div class="container mt-3">';
        echo '<ul class="list-group list-group-horizontal">';
        echo '<li class="list-group-item">';
        echo '<div class="card border-0" style="width:300px">';
        echo '<img class="card-img-top" src="' . $row["PHOTO"] . '" alt="Card image" style="width:100%">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">' . $row["TITRE"] . '</h4>';
        echo '<p class="card-text">' . truncateText($row["RÉSUMÉ"], 150) . '</p>';
        echo '<a href="livre.php?id=' . $row["id"] . '" class="btn btn-primary">Voir</a>';
        echo '</div></div></li></ul></div></div>';
    }
    $result->free();
} else {
    echo "Erreur lors de la récupération des produits : " . $connectionProjetIntegration->error;
}

// Fermeture de la connexion à la base de données
$connectionProjetIntegration->close();
