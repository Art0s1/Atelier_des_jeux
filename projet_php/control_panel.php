<!DOCTYPE html>
<html>
<head>
<title>Pannel D'Administration</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bonjour, <?php session_start();
	echo $_SESSION['usrname'] ?></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Accès rapide</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="seelog.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Tickets</a>
    <a href="utilisateurs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Informations D'Administration</b></h5>
  </header>
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
//requete qui prend les tickets exclusivement fermés
$sql = "SELECT count(*) as nb FROM ticket WHERE etat = 'ouvert'";
$result = $conn->query($sql);

// récupération du résultat
if ($result) {
    $row = $result->fetch_assoc();
    $ticketouvert = $row['nb'];
} else {
    $ticketouvert = 0; // au cas où la requête échoue
}
?>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $ticketouvert; ?></h3>
        </div>
        <div class="w3-clear"></div>
            <h4> <a href="ticketouvert.php" class="w3-btn w3-border">Tickets Ouvert <i></i></a> </h4>
      </div>
    </div>
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
//requete qui prend les tickets exclusivement fermés
$sql = "SELECT count(*) as nb FROM ticket WHERE etat = 'en cours'";
$result = $conn->query($sql);

// récupération du résultat
if ($result) {
    $row = $result->fetch_assoc();
    $ticketencour = $row['nb'];
} else {
    $ticketencour = 0; // au cas où la requête échoue
}
?>

    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $ticketencour; ?></h3>
        </div>
        <div class="w3-clear"></div>
            <h4><a href="ticketencour.php" class="w3-btn w3-border"> En cours <i></i></a> </h4>
      </div>
    </div>
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
//requete qui prend les tickets exclusivement fermés
$sql = "SELECT count(*) as nb FROM ticket WHERE etat = 'fermé'";
$result = $conn->query($sql);

// récupération du résultat
if ($result) {
    $row = $result->fetch_assoc();
    $ticketferme = $row['nb'];
} else {
    $ticketferme = 0; // au cas où la requête échoue
}
?>

    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $ticketferme; ?></h3>
        </div>
        <div class="w3-clear"></div>
            <h4> <a href="ticketferme.php" class="w3-btn w3-border">Tickets Fermés <i></i></a> </h4>
      </div>
    </div>
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
//requete qui prend les tickets exclusivement fermés
$sql = "SELECT count(*) as nb FROM utilisateurs";
$result = $conn->query($sql);

// récupération du résultat
if ($result) {
    $row = $result->fetch_assoc();
    $utilisateursnb = $row['nb'];
} else {
    $utilisateursnb = 0; // au cas où la requête échoue
}
?>

    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3> <?php echo $utilisateursnb ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4> <a href="utilisateurs.php" class="w3-btn w3-border"> Utilisateurs <i></i></a> </h4>
      </div>
    </div>
  </div>
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
//requete qui prend les 5 idT (id de tickets) dans l'odre décroissant
$sql = "SELECT * FROM ticket ORDER BY idT DESC LIMIT 5";
$result = $conn->query($sql);
?>
<div class="w3-container">
    <h5>Tickets Récents</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <tr>
            <th>ID Ticket</th>
            <th>Titre</th> <!-- Remplace par les colonnes que tu veux afficher -->
            <th>Description</th>
            <th>Utilisatezur</th>
            <th>email</th>
            <th>cause</th>
            <th>etat</th>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["idT"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["titre"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["utilisateur"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["cause"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["etat"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Aucune donnée disponible</td></tr>";
        }
        ?>
    </table><br>
    <a href="seelog.php" class="w3-button w3-dark-grey">Plus de tickets <i class="fa fa-arrow-right"></i></a>
</div>

<?php
$conn->close();
?>
  <hr>
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
//requete qui prend les 5 idT (id de tickets) dans l'odre décroissant
$sql = "SELECT * FROM utilisateurs ORDER BY idu DESC LIMIT 3";
$result = $conn->query($sql);
?>

<div class="w3-container">
    <h5>Utilisateurs Récents</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <tr>
            <th>Login</th>
            <th> Mdp </th>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["login"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["mdp"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Aucune donnée disponible</td></tr>";
        }
        ?>
    </table><br>
    <a href="utilisateurs.php" class="w3-button w3-dark-grey">Plus d'Utilisateurs <i class="fa fa-arrow-right"></i></a>
</div>
  <hr>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
