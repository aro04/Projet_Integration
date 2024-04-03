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
    // Validation côté serveur
    $errors = array();

    $lastName = $_POST['Last_name'];
    $firstName = $_POST['First_name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Cryptage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validation du nom et du prénom
    if (!preg_match('/^[a-zA-Z\-]+$/', $lastName) || !preg_match('/^[a-zA-Z\-]+$/', $firstName)) {
        $errors[] = "Le nom et le prénom ne doivent contenir que des lettres et des tirets (-).";
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez saisir une adresse e-mail valide.";
    }

    // Si des erreurs sont présentes, les afficher
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Si les données sont valides, procéder à l'insertion dans la base de données
        $request = $bdd->prepare("INSERT INTO users (Last_Name, First_Name, Email, Password) VALUES (:Last_Name, :First_Name, :Email, :Password)");
        $request->execute(
            array(
                "Last_Name" => $lastName,
                "First_Name" => $firstName,
                "Email" => $email,
                "Password" => $hashedPassword
            )
        );

        echo "Welcome to ArooBook!";
        echo '<a href="LogIn.php" class="btn btn-primary">Continue</a>';
    }
}
