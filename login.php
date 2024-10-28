<?php

$id = $pswd = "";
$idErr = $pswdErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['id'])) {
        $idErr = 'Veuillez entrer un identifiant';
    } else {
        $id = test_input($_POST['id']);
    }
    if (empty($_POST['pswd'])) {
        $pswdErr = 'Veuillez entrer un mot de passe';
    } else {
        $pswd = test_input($_POST['pswd']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="functions.php">
    <title>Mon réseau social</title>
</head>
<body>
    <h2>Bienvenu dans mon réseau social</h2>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <h3>Login</h3>
            <div>
                <label for="id" name="id">Identifiant</label>
                <input type="text" name="id" id="id">
                <span class='error'>* <?php echo $idErr; ?> </span>
            </div>
            <div>
                <label for="pswd" name="psw">Mot de passe</label>
                <input type="text" name="psw" id="psw">
                <span class='error'>* <?php echo $pswdErr; ?></span>
            </div>
            <div>
                <label for="website" name="website">site internet</label>
                <input type="text" name="website" id="website">
                <span class='error'>* <?php echo $pswdErr; ?></span>
            </div>
            <div>
                <p>Pas encore inscrit ? <?php echo "<a href='form_inscription.php';>Créez un compte</a>";?></p>
            </div>
            <div>
                <button type="submit">Soumettre</button>
            </div>

    </form>
    
</body>
</html>