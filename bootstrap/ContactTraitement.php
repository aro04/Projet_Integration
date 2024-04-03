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
    $errors = array();
    $Username = $_POST['Username'];
    $Email_Adress = $_POST['Email_Adress'];
    $Message = $_POST['Message'];
    if (!preg_match('/^[a-zA-Z\-]+$/', $Username)) {
        $errors[] = "Le prénom ne doit contenir que des lettres et des tirets (-).";
    }

    if (!preg_match("/^[a-zA-Z\-.,'!? \p{L}']+$/u", $Message)) {
        $errors[] = "Le message ne doit pas contenir des caractères spéciaux comme @ et {}. Les caractères autorisés sont les lettres, les tirets, les points, les virgules, les apostrophes, les points d'interrogation, les points d'exclamation et les espaces.";
    }


    // Validation de l'email
    if (!filter_var($Email_Adress, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez saisir une adresse e-mail valide.";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        $request = $bdd->prepare("INSERT INTO contact (Username, Email_Adress, Message) VALUES (:Username, :Email_Adress, :Message)");
        $request->execute(
            array(
                "Username" => $Username,
                "Email_Adress" => $Email_Adress,
                "Message" => $Message
            )
        );


        echo "Données insérées avec succès.";
        echo '<a href="Shop.php" class="btn btn-primary">Continue</a>';
    }
}
