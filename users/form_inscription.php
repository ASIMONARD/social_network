<?php
require 'form_securite.php';
require 'connexion_PDO.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social network</title>
</head>
<body>
    <h1>Social network</h1>
    <form method="POST">
        <div>
        <h2>Formilaire d'incription</h2>
        <p>* Champs obligatoirs</p>
        </div>
        <ul>
            <li>
                <label for="nom">Nom</label>
                <input type="text" id="nom" placeholder="Entrez votre nom" name="nom">
                <span class='error'>* <?php if (isset($errors['nom1'])) echo $errors['nom1']; ?></span>
            </li>
            <br>
            <li>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" placeholder= "Entrez votre prénom" name="prenom">
                <span class='error'>* <?php if (isset($errors['prenom1'])) echo $errors['prenom1']; ?></span>
            </li>
            <br>
            <li>
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" placeholder= "Entrez un pseudo" name="pseudo">
                <span class='error'>* <?php if (isset($errors['pseudo1'])) echo $errors['pseudo1']; ?></span>
            </li>
            <br>
            <li>
                <label for="mail">Mail</label>
                <input type="mail" id="mail" placeholder= "Entrez un E-mail" name="mail">
                <span class='error'>* <?php if (isset($errors['mail1'])) echo $errors['mail1']; ?></span>
            </li>
            <br>
            <li><select name="genre" id="genre">
                <option value="" disable selected>genre</option>
                <option value="Masculin">Masculin</option>
                <option value="Fémiin">Féminin</option>
                <span class='error'>* <?php if (isset($errors['genre1'])) echo $errors['genre1']; ?></span>
            </select> *</li>
            <br>
            <li>
                <label for="pswd1">Choisir un mot de passe</label>
                <input type="password" id="pswd1" placeholder= "Entrez un mot de passe" name="pswd1">
                <span class='error'>* <?php if (isset($errors['pswd1-1'])) echo $errors['pswd1-1']; ?></span>
            </li>
            <br>
            <li>
                <label for="pswd2">Recoper le mot de passe</label>
                <input type="password" id="pswd2" placeholder= "Entrez un mot de passe" name="pswd2">
                <span class='error'>* <?php if (isset($errors['pswd2-1'])) echo $errors['pswd2-1']; ?></span>
            </li>
        </ul>
        <br>
            <input type="submit" name="enregistrer" value="Enregistrer">
    </form>
    
</body>
</html>