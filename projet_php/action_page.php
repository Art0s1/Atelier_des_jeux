<?php
function verify_user($username_input, $password_input, $filename = '/etc/apache2/user.passwords') {
    if (!file_exists($filename)) {
        echo "Fichier introuvable !<br>";
        return false;
    }

    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, ':') === false) continue;

        list($username, $hash) = explode(':', $line, 2);

        echo "Comparaison avec : $username<br>";

        if ($username === $username_input) {
            echo "Utilisateur trouvé : $username<br>";
            $hashed_input = crypt($password_input, $hash);

            if (hash_equals($hash, $hashed_input)) {
                echo "Mot de passe correct<br>";
                return true;
            } else {
                echo "Mot de passe incorrect<br>";
                return false;
            }
        }
    }

    echo "Utilisateur non trouvé<br>";
    return false;
}

$username = $_POST['usrname'] ?? '';
$password = $_POST['passwd'] ?? '';

echo "Nom d'utilisateur reçu : $username<br>";
echo "Mot de passe reçu : $password<br>";

if (verify_user($username, $password)) {
    echo "Connexion réussie → Redirection...<br>";
    header("Refresh: 2; URL=home.html");
    exit;
} else {
    echo "Connexion échouée → Retour...<br>";
    header("Refresh: 2; URL=login_page.html");
    exit;
}
?>
