<!DOCTYPE html>
<html>
<title> Panel de Connection</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<body>

<div class="w3-container">
  <h2> Panel de conection</h2>

  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="" method="post">
        <div class="w3-section">
          <label><b>Nom d'utilisateur</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Utilisateur" name="usrname" required>
          <label><b>Mot de passe </b></label>
          <input class="w3-input w3-border" type="text" placeholder="Mot de passe" name="passwd" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
      </form>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-button w3-round-large"><a href="createuser.php"> Créer un Utilisateur</a></span>
        <span class="w3-right w3-button w3-round-large"><a href="createadmin.php"> Créer un Admin</a></span>
     </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
if ( ! isset($login) && ! isset($mdp)) {
//iinfo de db
$servername = "localhost";
$username = "projet";
$password = "1234";
$dbname = "projet_php";
//connection
$conn = new mysqli($servername, $username, $password, $dbname);
//erreur au cas ou
if ($conn->connect_error) {
	die("Connexion échouée: " . $conn->connect_error);
}
//requete qui vérifie si l'utilisateur et le mdp sont bon dans la DB
$sql = "SELECT * FROM utilisateurs WHERE login = ? AND mdp = ?";
// prépa de la requete
$stmt = $conn->prepare($sql);
//definition de $login et $mdp rentré par l'utilisateur
$login = $_POST['usrname'];
$mdp = md5($_POST['passwd']);
//définition des "?" par les variables définies
$stmt->bind_param("ss", $login, $mdp);
//demande et traitement
$stmt->execute();
$result = $stmt->get_result();
// traitement php, si un resultat sort de la condition sql alors on lance la session + redirection vers home.php
if ($result->num_rows > 0) {
	session_start();
	$_SESSION['usrname'] = $login;
	$_SESSION['passwd'] = $mdp;
	header("Location: home.php");
} else {
	echo " ";
	session_destroy();
}
} else {
	echo " ";
}
?>
