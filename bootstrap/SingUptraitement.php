<?php
$serveur = "localhost";
$user = "root";
$pw = "";
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=booklist", $user, $pw);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur:" . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier que les champs requis ne sont pas vides
    if (!empty($_POST['Last_name']) && !empty($_POST['First_name']) && !empty($_POST['Email']) && !empty($_POST['Password'])) {
        $Last_name = $_POST['Last_name'];
        $First_name = $_POST['First_name'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $request = $bdd->prepare("INSERT INTO users (Last_Name, First_Name, Email, Password) VALUES (:Last_Name, :First_Name, :Email, :Password)");
        $request->execute(
            array(
                "Last_Name" => $Last_name,
                "First_Name" => $First_name,
                "Email" => $Email,
                "Password" => $Password
            )
        );

        echo "Données insérées avec succès.";
    } else {
        echo "Tous les champs sont requis.";
    }
}
