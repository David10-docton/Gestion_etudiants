<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere_id = $_POST['filiere_id'];
    $sql = "INSERT INTO etudiants (nom, prenom, filiere_id) VALUES (:nom, :prenom, :filiere_id)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':filiere_id' => $filiere_id
        ]);
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}
?>