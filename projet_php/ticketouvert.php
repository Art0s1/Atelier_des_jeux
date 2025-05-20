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

// Vérification si un statut a été modifié
if (isset($_POST['update_status'])) {
    $ticket_id = $_POST['ticket_id'];
    $new_status = $_POST['etat'];

    // Mettre à jour le statut dans la base de données
    $update_query = "UPDATE ticket SET etat = ? WHERE idT = ?";
    $stmt = $mysqli->prepare($update_query);
    $stmt->bind_param("si", $new_status, $ticket_id);
    $stmt->execute();
    $stmt->close();
}

// Requête pour récupérer les tickets en ordre décroissant
$result = $mysqli->query("SELECT * FROM ticket where etat = 'ouvert' ORDER BY idT DESC");

echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Tickets Exclusivement Ouverts </title>
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
    echo '<h2>Liste des Tickets</h2>';
    echo '<table>';
    echo '<tr>';

    // Afficher les en-têtes de colonnes
    while ($fieldinfo = $result->fetch_field()) {
        echo '<th>' . htmlspecialchars($fieldinfo->name) . '</th>';
    }
    echo '<th>Changer le statut</th>'; // Colonne pour le menu déroulant
    echo '</tr>';

    // Afficher les lignes
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $key => $value) {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }

        // Ajouter un formulaire avec un menu déroulant pour changer le statut
        echo '<td>
                <form method="POST" action="">
                    <input type="hidden" name="ticket_id" value="' . $row['idT'] . '">
                    <select name="etat">
                        <option value="ouvert"' . ($row['etat'] == 'ouvert' ? ' selected' : '') . '>Ouvert</option>
                        <option value="en cours"' . ($row['etat'] == 'en cours' ? ' selected' : '') . '>En cours</option>
                        <option value="fermé"' . ($row['etat'] == 'fermé' ? ' selected' : '') . '>Fermé</option>
                    </select>
                    <button type="submit" name="update_status">Mettre à jour</button>
                </form>
              </td>';

        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<h2>Aucun ticket trouvé.</h2>';
}

echo '
</body>
</html>
';

$mysqli->close();
?>
