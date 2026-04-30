<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM etudiants WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([':id' => $id]);
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
        exit();
    }
}
header("Location: index.php");
exit();
?>