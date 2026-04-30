<?php 
include 'connexion.php'; 
$query = $pdo->query("SELECT * FROM filieres");
$filieres = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <h2>Ajouter un Étudiant</h2>
    <form action="traitement.php" method="POST" id="formEtudiant">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        
        <select name="filiere_id" required>
            <option value=""> Choisir une filière </option>
            <?php foreach ($filieres as $filiere): ?>
                <option value="<?= $filiere['id'] ?>"><?= $filiere['nom'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Enregistrer</button>
    </form>
    <script src="assets/js/script.js"></script>
</body>
</html>