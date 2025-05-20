<!DOCTYPE html>
<html>
<title> Panel de création d'utilisateurs </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<div class="w3-container">
  <h2> Panel de création d'Utilisateurs </h2>
	<th>
  <a href="login_page.php" class="fa fa-home w3-button w3-large"> Pannel de connection </button></a>
	<th>
	<p>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Créer</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="" method="post">
        <div class="w3-section">
          <label><b> Nom d'utilisateur</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder=" nom " name="usrname" required>
          <label><b>Mot De Passe</b></label>
          <input class="w3-input w3-border" type="text" placeholder=" Mot de passe " name="passwd" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Créer</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Se souvenir de moi
        </div>
      </form>
      </div>

    </div>
  </div>
</div>
</body>
</html>
<?php
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
$login = $_POST['usrname'];
$passwd = $_POST['passwd'];
//requete qui prend les tickets exclusivement fermés
$sql = "INSERT INTO utilisateurs (login, mdp) VALUES ('$login', MD5('$passwd'))";
$result = $conn->query($sql);
?>
