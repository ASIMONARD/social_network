<?php
$conn = new mysqli('localhost', 'root', 'N@emie91', 'mon_reseau_social');

if ($conn->connect_error) {
    die ("La connection a échoué" . $conn->connect_error);
}

$nom = $prenom = $pseudo = $mail = $genre = $website = "";
$nomErr = $prenomErr = $pseudoErr = $mailErr = $genreErr = $websiteErr = "";

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
    
    // Si aucune erreur dans le formulaire, insertion dans la base de données
    if (empty($servers)) {
        $stmt = $conn->prepare("insert into utilisateurs (Nom, Prenom, Pseudo, Email, Genre) values (?, ?, ?, ?, ?)"); // Préparation de la requête de manière sécurisé avect "stmt" (statement)
        $stmt->bind_param('sssss', $nom, $prenom, $pseudo, $email, $genre); //Lier les paramètres. 'SSMMS' sont les types des différentes variables (String, Mixed)

        //Exécuter la requête
        if ($stmt->execute()) {
            echo 'Inscriptio réussie !';
        } else {
            echo "erreur lors de l'inscription" . $stmt->error;
        }

        // fermer le statement
        $stmt->close();
    } else {
        //Afficher les erreurs
        foreach ($servers as $Serveur) {
            echo $server . '<br>';
        }
    }
}

//Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="functions.php">
    <title>Réseau social</title>
</head>
<body>
    <h1>Mon réseau social</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
        <h2>Formilaire d'incription</h2>
        </div>
        <ul>
            <li>
                <label for="nom">Nom</label>
                <input type="text" id="nom" placeholder="Entrez votre nom" nom="nom">
                <span class='error'>* <?php echo $nomErr; ?></span>
            </li>
            <br>
            <li>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" placeholder= "Entrez votre prénom" nom="prenom">
                <span class='error'>* <?php echo $prenomErr; ?></span>
            </li>
            <br>
            <li>
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" placeholder= "Entrez un pseudo" nom="pseudo">
                <span class='error'>* <?php echo $pseudoErr; ?></span>
            </li>
            <br>
            <li>
                <label for="mail">Mail</label>
                <input type="mail" id="mail" placeholder= "Entrez un E-mail" nom="mail">
                <span class='error'>* <?php echo $mailErr; ?></span>
            <br>
            <select name="genre" id="genre">
                <option value="" disable selected>genre</option>
                <option value="">Masculin</option>
                <option value="">Féminin</option>
                <span class='error'>* <?php echo $genreErr; ?></span>
            </select> *
        </ul>
        <br>
            <input type="submit">
    </form>
    
</body>
</html>