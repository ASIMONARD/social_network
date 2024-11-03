<?php
require 'functions.php';

$nom = $prenom = $pseudo = $mail = $genre = $pswd1 = $pswd2 = "";
$nomErr = $prenomErr = $pseudoErr = $mailErr = $genreErr = $pswd1Err = $pswd2Err =  "";

//Champs obligatoirs

if ($_POST) {

    $errors = array();
    
    if (empty($_POST['nom'])) {
        $errors['nom1'] = "Le nom doit être renseigné";
    } else {
        $nom = test_input($_POST['nom']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) {                            //Avec validation du nom
            $errors['nom1'] = "Seuls les stres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['prenom'])) {
        $errors['prenom1'] = "Le prénom doit être renseigné";
    } else {
        $prenom = test_input($_POST['prenom']);                                 //Avec validation du prénom
        if (!preg_match("/^[a-zA-Z-'0-99 ]*$/", $prenom)) {
            $errors['prenom1'] = "Seuls les lesstres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['pseudo'])) {
        $errors['pseudo1'] = "Le pseudo doit être renseigné";
    } else {
        $pseudo = test_input($_POST['pseudo']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $prenom)) {                         //avec validation du pseud
            $errors['pseudo1'] = "Seuls les lesstres et espaces blancs sont autorisés";
        }
    }
    if (empty($_POST['mail'])) {
        $errors['mail1'] = "Le mail doit être renseigné";
    } else {
        $mail = test_input($_POST['mail']);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {                        //Avec valisation de l'E-mail
            $errors['mai1'] = 'Format de mail invalide';
        }
    }
    if (empty($_POST['genre'])) {
        $errors['genre1'] = "Le genre doit être renseigné";
    }
    if (empty($_POST['pswd1'])) {
        $errors['pswd1-1'] = 'Vous devez créer un mot de passe';

        //hachage du mot de passe
        $hashedpaswd = password_hash($pswd1, PASSWORD_DEFAULT);
    }
    if (empty($_POST['pswd2']) || (($_POST['pswd2'])) != ($_POST['pswd1'])) {
        $errors['pswd2-1'] = 'Le mot de passe ne correspod pas à celui entré au-dessus';
    }
    if (count($errors) == 0) {
        header ('Location: connexion_PDO.php');
        exit();
    }
}
?>