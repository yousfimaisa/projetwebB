<?php
// Inclure le contrôleur pour ajouter une réponse
require_once '../../controller/repondaviscontroller.php';

// Créer une instance du contrôleur
$repondAvisController = new RepondAvisController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données envoyées par le formulaire
    $avis_id = $_POST['avis_id'];
    $reponse = $_POST['reponse'];

    // Créer une instance de RepondAvis avec les données récupérées
    $reponseAvis = new RepondAvis($avis_id, $reponse);

    // Appeler la méthode pour ajouter la réponse
    $result = $repondAvisController->addReponse($reponseAvis);

    echo $result;  // Afficher le résultat (succès ou erreur)
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Réponse Avis</title>
    <link rel="stylesheet" href="repond.css">
    <nav>
        <ul>
        <li><a href="addrepondavis.php">Ajouter une Réponse Avis</a></li>
                <li><a href="listrepondavis.php">Liste des Réponses Avis</a></li>
                <li><a href="deleterepondavis.php">Supprimer une Réponse Avis</a></li>
                <li><a href="uprepondreavis.php">Mettre à jour des Réponses Avis</a></li>
        
        </ul>
    </nav>
</head>
<body>

<h1>Ajouter une Réponse à un Avis</h1>

<form method="POST" action="addrepondavis.php">
    <label for="avis_id">ID de l'Avis:</label>
    <input type="number" name="avis_id" required><br>

    <label for="reponse">Réponse:</label>
    <textarea name="reponse" required></textarea><br>

    <input type="submit" value="Ajouter la Réponse">
</form>

</body>
</html>
