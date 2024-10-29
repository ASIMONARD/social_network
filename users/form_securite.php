<?php
function test_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = $prenom = $pseudo = $mail = $genre = "";
$nomErr = $prenomErr = $pseudoErr = $mailErr = $genreErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty($_POST['nom'])) {
        $nomErr = "Le nom doit être renseigné";
    } else {
        $nom = test_input($_POST['nom']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) {
            $nameErr = "Seuls les lesstres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['prenom'])) {
        $prenomErr = "Le prénom doit être renseigné";
    } else {
        $prenom = test_input($_POST['prenom']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $prenom)) {
            $nameErr = "Seuls les lesstres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['pseudo'])) {
        $pseudoErr = "Le pseudo doit être renseigné";
    } else {
        $pseudo = test_input($_POST['pseudo']);
    }
    if (empty($_POST['mail'])) {
        $mailErr = "Le mail doit être renseigné";
    } else {
        $mail = test_input($_POST['mail']);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = 'Format de mail invalide';
        }
    }
    if (empty($_POST['genre'])) {
        $genreErr = "Le genre doit être renseigné";
    } else {
        $genre = test_input($_POST['genre']);
    }
}
?>