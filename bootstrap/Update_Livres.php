<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des livres</title>
    </head>

    <body>

        <h2>Ajouter un livre</h2>
        <form action="ajouter_livre.php" method="post">
            <label for="TITRE">Titre:</label><br>
            <input type="text" id="TITRE" name="TITRE" required><br>
            <label for="AUTEUR">Auteur:</label><br>
            <input type="text" id="AUTEUR" name="AUTEUR" required><br>
            <label for="PHOTO">PHOTO</label><br>
            <input type="text" id="PHOTO" name="PHOTO" required><br><br>
            <label for="RÉSUMÉ">RÉSUMÉ</label><br>
            <input type="text" id="RÉSUMÉ" name="RÉSUMÉ" required><br><br>
            <label for="PRIX">PRIX</label><br>
            <input type="text" id="PRIX" name="PRIX" required><br><br>
            <label for="NOMBRE_DE_PAGE">NOMBRE DE PAGE</label><br>
            <input type="text" id="NOMBRE_DE_PAGE" name="NOMBRE_DE_PAGE" required><br><br>
            <label for="QUANTITE">QUANTITE</label><br>
            <input type="text" id="QUANTITE" name="QUANTITE" required><br><br>
            <button type="submit" name="ajouter_livre" class="primary-button">Ajouter Livre</button>

        </form>

        <h2>Supprimer un livre</h2>
        <form action="supprimer_livre.php" method="post">
            <label for="id">ID du Livre à Supprimer:</label><br>
            <input type="text" id="id" name="id" required><br><br>
            <button type="submit" name="supprimer_livre">Supprimer Livre</button>
        </form>

    </body>

    </html>

    <?php
    include('connexionBD.php');
    // Ajouter un livre
    if (isset($_POST['ajouter_livre'])) {
        $titre = $_POST['TITRE'];
        $auteur = $_POST['AUTEUR'];
        $photo = $_POST['PHOTO'];
        $auteur = $_POST['RÉSUMÉ'];
        $prix = $_POST['PRIX'];
        $page = $_POST['NOMBRE_DE_PAGE'];
        $quantite = $_POST['QUANTITE'];

        $sql = "INSERT INTO livres (TITRE, AUTEUR, PHOTO, RÉSUMÉ, PRIX, NOMBRE_DE_PAGE, QUANTITE) VALUES ('$titre', '$auteur', '$prix', '$page', '$quantite')";
        if ($connectionProjetIntegration->query($sql) === true) {
            echo "Livre ajouté avec succès.";
        } else {
            echo "Erreur : Impossible d'ajouter le livre. " . $connectionProjetIntegration->error;
        }
    }

    // Supprimer un livre
    if (isset($_POST['supprimer_livre'])) {
        $id_livre = $_POST['id'];

        $sql = "DELETE FROM livres WHERE id = $id_livre";
        if ($connectionProjetIntegration->query($sql) === true) {
            echo "Livre supprimé avec succès.";
        } else {
            echo "Erreur : Impossible de supprimer le livre. " .  $connectionProjetIntegration->error;
        }
    }

    // Fermer la connexion
    $connectionProjetIntegration->close();
    ?>
</body>

</html>