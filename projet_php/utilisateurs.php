<?php
$host = 'localhost';
$user = 'projet';
$pass = '1234';
$db = 'projet_php';

$mysqli = new mysqli($host, $user, $pass, $db);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// 🔽 Traitement de la suppression (ajouté)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $idu = intval($_POST['idu']); // Sécuriser l'entrée

    $stmt = $mysqli->prepare("DELETE FROM utilisateurs WHERE idu = ?");
    $stmt->bind_param("i", $idu);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']); // Recharger la page
    exit;
}

// Requête pour récupérer les tickets en ordre décroissant
$result = $mysqli->query("SELECT * FROM utilisateurs ORDER BY login");

echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Utilisateurs </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        select {
            padding: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
';
if ($result && $result->num_rows > 0) {
    echo '<h2> Utilisateurs </h2>';
    echo '<table>';
    echo '<tr>';

    // Afficher les en-têtes de colonnes
    while ($fieldinfo = $result->fetch_field()) {
        echo '<th>' . htmlspecialchars($fieldinfo->name) . '</th>';
    }
    echo '<th>Action</th>'; // Colonne pour le bouton
    echo '</tr>';

    // Afficher les lignes
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $key => $value) {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }

        // 🔽 Bouton Supprimer (ajouté)
        echo '<td>
                <form method="POST" action="">
                    <input type="hidden" name="idu" value="' . $row['idu'] . '">
                    <button type="submit" name="delete_user">Supprimer</button>
                </form>
              </td>';

        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<h2>Aucun Utilisateurs trouvés.</h2>';
}

echo '
</body>
</html>
';

$mysqli->close();
?>
