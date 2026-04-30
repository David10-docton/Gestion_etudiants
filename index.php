<?php 
include 'db.php'; 
$queryFilieres = $pdo->query("SELECT * FROM filieres");
$filieres = $queryFilieres->fetchAll();
$queryEtudiants = $pdo->query("SELECT etudiants.id, etudiants.nom, etudiants.prenom, filieres.nom AS nom_filiere 
                                FROM etudiants 
                                JOIN filieres ON etudiants.filiere_id = filieres.id");
$etudiants = $queryEtudiants->fetchAll();
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

    <hr>

    <h2>Liste des Étudiants</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $e): ?>
                <tr>
                    <td><?= htmlspecialchars($e['nom']) ?></td>
                    <td><?= htmlspecialchars($e['prenom']) ?></td>
                    <td><?= htmlspecialchars($e['nom_filiere']) ?></td>
                    <td>
                        <!-- Liens vers les actions -->
                        <a href="update.php?id=<?= $e['id'] ?>">Modifier</a>
                        <a href="delete.php?id=<?= $e['id'] ?>" onclick="return confirm('Supprimer cet étudiant ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="assets/js/script.js"></script>
</body>
</html>