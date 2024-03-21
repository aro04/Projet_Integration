<?php
include('connexionBD.php');
// Vérifie si l'identifiant du livre est présent dans les paramètres de l'URL
if (isset($_GET['id'])) {
    $id_livre = $_GET['id'];
    $requete = $connectionProjetIntegration->prepare("SELECT * FROM livres WHERE id = ?");
    $requete->bind_param("i", $id_livre);
    $requete->execute();
    $resultat = $requete->get_result();

    // Vérifie si le livre existe
    if ($resultat->num_rows > 0) {
        // Affiche les informations du livre
        $ligne = $resultat->fetch_assoc();
        echo '<div class="card border-0" style="display: flex; width: 800px;">'; // Utilisation de flexbox pour aligner les éléments
        // Colonne gauche
        echo '<div style="flex: 1;">';
        echo '<h1>' . $ligne["TITRE"] . '</h1>';
        echo '<img src="' . $ligne["PHOTO"] . '" alt="img" style="width:100%">';
        echo '<h2>' . $ligne["AUTEUR"] . '</h2>';
        echo '<h4>Nombre de page: ' . $ligne["NOMBRE_DE_PAGE"] . '</h4>';
        echo '</div>';
        // Colonne droite
        echo '<div style="flex: 1; margin-left: 40px; margin-top: 150px;">'; // Espacement entre les colonnes
        echo '<h2> Résumé </h2>';
        echo '<p>' . $ligne["RÉSUMÉ"] . '</p>';
        echo '<h3>Prix: $' . $ligne["PRIX"] . '</h3>';
        echo '<button>Acheter</button>'; // Bouton d'achat
        echo '<a href="Shop.php?id=' . $ligne["id"] . '" class="btn  btn-secondary">Retour</a>';
        echo '</div>';
        echo '<aside>';
        echo '</div>'; // Fin de la carte
    } else {
        // Si le livre n'existe pas, affiche un message d'erreur
        echo "Aucun livre trouvé avec cet identifiant.";
    }
}
