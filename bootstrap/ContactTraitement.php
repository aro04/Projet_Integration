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
    if (!empty($_POST['Username']) && !empty($_POST['Email_Adress']) && !empty($_POST['Message'])) {
        $Username = $_POST['Username'];
        $Email_Adress = $_POST['Email_Adress'];
        $Message = $_POST['Message'];

        $request = $bdd->prepare("INSERT INTO contact (Username, Email_Adress, Message) VALUES (:Username, :Email_Adress, :Message)");
        $request->execute(
            array(
                "Username" => $Username,
                "Email_Adress" => $Email_Adress,
                "Message" => $Message
            )
        );

        echo "Données insérées avec succès.";
    } else {
        echo "Tous les champs sont requis.";
    }
}
