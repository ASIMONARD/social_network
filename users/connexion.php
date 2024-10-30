<?php
require 'form_inscription.php';

$conn = new mysqli ('localhost', 'root', 'N@emie91', 'social_network');

if ($conn->connect_error) {
    die ("La connection a échoué :" . $conn->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$genre = $_POST['genre'];


$sql = "INSERT INTO utilisateurs (nom, prenom, pseudo, mail, genre) VALUES ('$nom', '$prenom', '$pseudo', '$mail', '$genre')";

if (mysqli_query($conn, $sql)) {
    echo 'Inscription réussie';
} else {
    echo 'Echec';
}
?>