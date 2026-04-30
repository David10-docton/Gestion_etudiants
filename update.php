<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM etudiants WHERE id = ?");
    $stmt->execute([$id]);
    $etudiant = $stmt->fetch();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE etudiants SET nom = ?, prenom = ?, filiere_id = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['nom'], $_POST['prenom'], $_POST['filiere_id'], $_POST['id']]);
    header("Location: index.php");
    exit();
}

$filieres = $pdo->query("SELECT * FROM filieres")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'étudiant</title>
</head>
<body>
    <h2>Modifier les informations</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
        <input type="text" name="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>" required>
        <input type="text" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>" required>
        
        <select name="filiere_id" required>
            <?php foreach ($filieres as $f): ?>
                <option value="<?= $f['id'] ?>" <?= $f['id'] == $etudiant['filiere_id'] ? 'selected' : '' ?>>
                    <?= $f['nom'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>