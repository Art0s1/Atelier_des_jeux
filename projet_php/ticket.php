<?php
// Traitement du formulaire
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $utilisateur = $_SESSION['usrname'];
    $email = htmlspecialchars($_POST['email']);
    $cause = htmlspecialchars($_POST['cause']);
    $etat = "ouvert"; // Valeur par défaut

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'projet_php'; // <-- Remplace par ton nom de base
    $username = 'projet';         // <-- Remplace si nécessaire
    $password = '1234';             // <-- Remplace si nécessaire

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO ticket (titre, description, utilisateur, email, cause, etat) 
                VALUES (:titre, :description, :utilisateur, :email, :cause, :etat)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':titre' => $titre,
            ':description' => $description,
            ':utilisateur' => $utilisateur,
            ':email' => $email,
            ':cause' => $cause,
            ':etat' => $etat
        ]);

        echo "<p style='color:green;'>Ticket créé avec succès !</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
    }
}
?>

<!-- Formulaire HTML -->
<h2>Créer un ticket</h2>
<form method="POST" action="">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" required><br><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="email">Email :</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="cause">Cause :</label><br>
    <select id="cause" name="cause" required>
        <option value="problème réseaux">Problème réseaux</option>
        <option value="problème matériel">Problème matériel</option>
        <option value="autre">Autre</option>
    </select><br><br>

    <button type="submit">Envoyer le ticket</button>
</form>
