<?php
session_start();
require_once '../config/database.php'; // Assurez-vous que la connexion à la base de données est bien incluse

// Vérification si l'utilisateur est connecté et est un recruteur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'recruteur') {
    header('Location: dashboardRecru');
    exit();
}

// Connexion à la base de données
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Ajout d'une offre
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ajouter_offre'])) {
    $description = $conn->real_escape_string($_POST['description']);
    $entreprise = $conn->real_escape_string($_POST['entreprise']);
    $contrat = $conn->real_escape_string($_POST['contrat']);
    $date_limit = $_POST['date_limit'];
    $id_recru = $_SESSION['user_id']; // ID du recruteur connecté

    $sql = "INSERT INTO offres (id_recru, date_limit, description, entreprise, contrat) VALUES ('$id_recru', '$date_limit', '$description', '$entreprise', '$contrat')";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Offre ajoutée avec succès !</p>";
    } else {
        echo "<p style='color: red;'>Erreur : " . $conn->error . "</p>";
    }
}

// Suppression d'une offre
if (isset($_GET['supprimer'])) {
    $id_offre = intval($_GET['supprimer']);
    $sql = "DELETE FROM offres WHERE id = '$id_offre' AND id_recru = '" . $_SESSION['user_id'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Offre supprimée avec succès !</p>";
    } else {
        echo "<p style='color: red;'>Erreur lors de la suppression.</p>";
    }
}

// Récupération des offres du recruteur
$sql = "SELECT * FROM offres WHERE id_recru = '" . $_SESSION['user_id'] . "'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Recruteur</title>
</head>
<body>

    <h1>Bienvenue sur votre espace recruteur</h1>

    <h2>Publier une nouvelle offre</h2>
    <form method="POST">
        <label>Entreprise :</label>
        <input type="text" name="entreprise" required>
        <label>Type de contrat :</label>
        <input type="text" name="contrat" required>
        <label>Date limite :</label>
        <input type="date" name="date_limit" required>
        <label>Description :</label>
        <textarea name="description" required></textarea>
        <button type="submit" name="ajouter_offre">Ajouter l'offre</button>
    </form>

    <h2>Vos offres publiées</h2>
    <table border="1">
        <tr>
            <th>Entreprise</th>
            <th>Contrat</th>
            <th>Date limite</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($offre = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= htmlspecialchars($offre['entreprise']) ?></td>
                <td><?= htmlspecialchars($offre['contrat']) ?></td>
                <td><?= htmlspecialchars($offre['date_limit']) ?></td>
                <td><?= htmlspecialchars($offre['description']) ?></td>
                <td>
                    <a href="modifier_offre.php?id=<?= $offre['id'] ?>">Modifier</a>
                    <a href="?supprimer=<?= $offre['id'] ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
