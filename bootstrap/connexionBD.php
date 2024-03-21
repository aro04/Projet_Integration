<?php
$serveur = "localhost";
$user = "root";
$pw = "";
$bdd = "booklist";
$connectionProjetIntegration = new mysqli($serveur, $user, $pw, $bdd);

// Vérifie la connexion
if ($connectionProjetIntegration->connect_error) {
    die("Echec de la connexion : " . $connectionProjetIntegration->connect_error);
}
