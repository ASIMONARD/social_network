<?php
try {
    //Connection à la bas de donées
    $pdo = new pdo ("mysql: host = localost; dnname = social_network", "root", "N@emie91");

    //Configuraton des erreurs pour les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $genre = $_POST['genre'];

    //Préparation de la requête
    $stmt = $pdo->prepare ("INSERT INTO utilisateurs (nom, prenom, pseudo, mail, genre) VALUES ('$nom', '$prenom', '$pseudo', '$mail', '$genre')");

    //Lier les paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $nom);
    $stmt->bindParam(':pseudo', $nom);
    $stmt->bindParam(':mail', $nom);
    $stmt->bindParam(':genre', $nom);

    //Exécution de la requête
    if ($stmt->execute()) {
        echo 'Donées insérées avec succès';
    } else {
        echo 'Echec';
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion : " . $e->getMessage();
}
$pdo = null;
?>