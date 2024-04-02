<?php
session_start();
echo "Contenu du panier avant la suppression : <pre>";
print_r($_SESSION['panier']);
echo "</pre>";

// Suppression de l'article du panier



// Vérifier si l'ID du livre à supprimer est passé en paramètre
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_livre_a_supprimer = $_GET['id'];

    // Parcourir le panier et supprimer le livre correspondant
    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $index => $livre) {
            if (isset($livre['id']) && $livre['id'] == $id_livre_a_supprimer) {
                // Supprimer le livre du panier
                unset($_SESSION['panier'][$index]);
                break;
            }
        }
    }
}
// Après la suppression
echo "Contenu du panier après la suppression : <pre>";
print_r($_SESSION['panier']);
echo "</pre>";
header("Location: CartIn.php");
exit;
