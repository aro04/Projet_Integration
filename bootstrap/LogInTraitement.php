<?php
// Code de connexion à la base de données
$serveur = "localhost";
$user = "root";
$pw = "";
$bdd = new PDO("mysql:host=$serveur;dbname=booklist;charset=utf8mb4", $user, $pw);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Vérification si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si le formulaire est soumis avec des champs d'identification d'utilisateur et de mot de passe
    if (isset($_POST['Email']) && isset($_POST['Password'])) {
        $email = $_POST['Email'];
        $mot_de_passe = $_POST['Password'];

        // Récupérer les informations de l'utilisateur à partir de la base de données
        $stmt = $bdd->prepare("SELECT * FROM users WHERE Email=:email");
        $stmt->execute(array(':email' => $email));
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si l'utilisateur existe dans la base de données
        if ($utilisateur) {
            // Vérification du mot de passe 
            //echo 'bonjour';
            if (password_verify($mot_de_passe, $utilisateur['Password'])) {
                // Mot de passe correct, l'utilisateur est authentifié
                //echo $utilisateur['Password'];
                if ($utilisateur['Is_Admin'] == 1) {
                    // L'utilisateur est un admin
                    echo "Welcome admin!";
                    echo '<a href="MyAdmin.php" class="btn btn-primary">Continue</a>';
                } else {
                    // L'utilisateur est un utilisateur normal
                    echo "Welcome user!";
                    echo '<a href="Shop.php" class="btn btn-primary">Continue</a>';
                }
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect!";
            }
        } else {
            // L'utilisateur n'existe pas dans la base de données ou les identifiants sont incorrects
            echo "Identifiants incorrects!";
        }
    } else {
        // Si les champs ne sont pas définis
        echo "Veuillez remplir tous les champs!";
    }
}
