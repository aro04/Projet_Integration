<!DOCTYPE html>
<html lang="en">

<head>
    <title>Navigation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .card {
            display: flex;
            flex-direction: row;
        }

        .card-body {
            flex: 1;
            margin-left: 80px;
        }

        .margin-top-30 {
            margin-top: 30px;
        }

        .button-spacing {
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="LogIn.php">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="CartIn.php">Cart</a>
            </li>
        </ul>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <?php
            include('connexionBD.php');
            session_start();
            // Vérifie si l'identifiant du livre est présent dans les paramètres de l'URL
            if (isset($_GET['id'])) {
                $id_livre = $_GET['id'];
                $requete = $connectionProjetIntegration->prepare("SELECT * FROM livres WHERE id = ?");
                $requete->bind_param("i", $id_livre);
                $requete->execute();
                $resultat = $requete->get_result();

                if ($resultat->num_rows > 0) {
                    // Affiche les informations du livre
                    $ligne = $resultat->fetch_assoc();
                    echo '<div class="card border-0" style="width: 1000px;">'; // Utilisation de flexbox pour aligner les éléments
                    // Colonne gauche
                    echo '<div class="card-body">';
                    echo '<h1>' . $ligne["TITRE"] . '</h1>';
                    echo '<img src="' . $ligne["PHOTO"] . '" alt="img" style="width:100%">';
                    echo '<h2>' . $ligne["AUTEUR"] . '</h2>';
                    echo '<h4>Nombre de page: ' . $ligne["NOMBRE_DE_PAGE"] . '</h4>';
                    echo '</div>';
                    // Colonne droite
                    echo '<div class="card-body margin-top-30">';
                    echo '<h4> Résumé </h4>';
                    echo '<p>' . $ligne["RÉSUMÉ"] . '</p>';
                    echo '<h3>Prix: $' . $ligne["PRIX"] . '</h3>';
                    //echo '<form method="post" action="*">';
                    //echo '<input type="hidden" name="add_to_cart" value="' . $id_livre . '">';
                    //echo '<button type="submit" class="btn btn-primary button-spacing">Add to Cart</button>';
                    //echo '</form>';
                    echo '<a href="CartIn.php?id=' . $ligne["id"] . '" class="btn btn-primary button-spacing">Add to Cart</a>';
                    echo '<a href="Shop.php?id=' . $ligne["id"] . '" class="btn btn-secondary">Retour</a>';
                    echo '<br>';
                    echo '</div>';
                    echo '</div>'; // Fin de la carte
                } else {
                    // Si le livre n'existe pas, affiche un message d'erreur
                    echo "Aucun livre trouvé avec cet identifiant.";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>