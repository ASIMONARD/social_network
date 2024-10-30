<?php

//Foction de valisation du formuaire

function test_input ($data) {
    $data = trim($data);                //Supprime les espace avant et après la valeur
    $data = stripslashes($data);        //Supprime les backslashes
    $data = htmlspecialchars($data);    //Converti les caractères spéciux en entités HTML
    return $data;
}

$nom = $prenom = $pseudo = $mail = $genre = "";
$nomErr = $prenomErr = $pseudoErr = $mailErr = $genreErr = "";

//Champs obligatoirs

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty($_POST['nom'])) {
        $nomErr = "Le nom doit être renseigné";
    } else {
        $nom = test_input($_POST['nom']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) {                            //Avec validation du nom
            $nomErr = "Seuls les stres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['prenom'])) {
        $prenomErr = "Le prénom doit être renseigné";
    } else {
        $prenom = test_input($_POST['prenom']);                                 //Avec validation du prénom
        if (!preg_match("/^[a-zA-Z-'0-99 ]*$/", $prenom)) {
            $prenomErr = "Seuls les lesstres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['pseudo'])) {
        $pseudoErr = "Le pseudo doit être renseigné";
    } else {
        $pseudo = test_input($_POST['pseudo']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $prenom)) {                         //avec validation du pseud
            $nameErr = "Seuls les lesstres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['mail'])) {
        $mailErr = "Le mail doit être renseigné";
    } else {
        $mail = test_input($_POST['mail']);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {                        //Avec valisation de l'E-mail
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