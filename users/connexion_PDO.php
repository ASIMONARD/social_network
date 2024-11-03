<?php


try {
    //Connection à la bas de donées
    $dsn = "mysql:host=localhost; dbname=social_network; charset=utf8mb4";
    $pdo = new PDO($dsn, 'root', 'N@emie91');

    //Configuraton des erreurs pour les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Préparation de la requête
    $stmt = $pdo->prepare ("INSERT INTO utilisateurs (nom, prenom, pseudo, mail, genre, pswd1, pswd2) VALUES (:nom, :prenom, :pseudo, :mail, :genre, :pswd1, :pswd2)");

    //Lier les paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':pswd1', $pswd1);
    $stmt->bindParam(':pswd2', $pswd2);

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