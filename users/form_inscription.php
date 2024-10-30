<?php
require 'form_securite.php';
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
    <form action="connexion_PDO.php" method="post">
        <div>
        <h2>Formilaire d'incription</h2>
        <p>* Champs obligatoirs</p>
        </div>
        <ul>
            <li>
                <label for="nom">Nom</label>
                <input type="text" id="nom" placeholder="Entrez votre nom" name="nom">
                <span class='error'>* <?php echo $nomErr; ?></span>
            </li>
            <br>
            <li>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" placeholder= "Entrez votre prénom" name="prenom">
                <span class='error'>* <?php echo $prenomErr; ?></span>
            </li>
            <br>
            <li>
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" placeholder= "Entrez un pseudo" name="pseudo">
                <span class='error'>* <?php echo $pseudoErr; ?></span>
            </li>
            <br>
            <li>
                <label for="mail">Mail</label>
                <input type="mail" id="mail" placeholder= "Entrez un E-mail" name="mail">
                <span class='error'>* <?php echo $mailErr; ?></span>
            <br>
            <select name="genre" id="genre">
                <option value="" disable selected>genre</option>
                <option value="Masculin">Masculin</option>
                <option value="Fémiin">Féminin</option>
                <span class='error'>* <?php echo $genreErr; ?></span>
            </select> *
        </ul>
        <br>
            <input type="submit">
    </form>
    
</body>
</html>