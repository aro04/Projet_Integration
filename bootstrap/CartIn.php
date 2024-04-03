<?php
session_start();
include('connexionBD.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="LogIn.php">Log in</a>
                <li class="nav-item">
                    <a class="nav-link" href="Shop.php">Continue shopping</a>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container mt-5">
            <h2>Your Cart</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ajouter au panier
                    if (isset($_GET['id'])) {
                        $id_livre = $_GET['id'];
                        $requete = $connectionProjetIntegration->prepare("SELECT * FROM livres WHERE id = ?");
                        $requete->bind_param("i", $id_livre);
                        $requete->execute();
                        $resultat = $requete->get_result();

                        if ($resultat->num_rows > 0) {
                            $livre = $resultat->fetch_assoc();
                            $_SESSION['panier'][] = array(
                                'id' => $livre['id'],
                                'photo' => $livre['PHOTO'],
                                'titre' => $livre['TITRE'],
                                'prix' => $livre['PRIX'],
                                'quantite' => 1
                            );
                        }
                    }

                    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                        foreach ($_SESSION['panier'] as $id_livre => $livre) {
                            echo "<tr>";
                            echo "<td><img src='" . $livre['photo'] . "' alt='Photo de livre' style='width:100px'></td>";
                            echo "<td>" . (isset($livre['titre']) ? $livre['titre'] : "") . "</td>";
                            echo "<td>" . (isset($livre['prix']) ? $livre['prix'] : "") . "</td>";
                            // Ajoutez une vérification pour la clé 'quantite'
                            echo "<td>" . (isset($livre['quantite']) ? $livre['quantite'] : "") . "</td>";
                            echo '<td><a href="Delete.php?id=' . (isset($livre['id']) ? $livre['id'] : "") . '"class="btn btn-danger">Delete</a></td>';
                            echo "</tr>";
                        }

                        // Calculer le total des prix
                        $total = 0;
                        foreach ($_SESSION['panier'] as $livre) {
                            // Vérifiez si la clé 'quantite' est définie avant de l'utiliser
                            $quantite = isset($livre['quantite']) ? $livre['quantite'] : 0;
                            $total += $livre['prix'] * $quantite;
                        }
                        echo "<tr><td colspan='5'>TOTAL: $total</td></tr>";
                    } else {
                        echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="checkout.php" class="btn btn-primary">Payer</a>
        </div>
    </section>
</body>

</html>