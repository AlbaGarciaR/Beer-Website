<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
// On crée les variables de session dans $_SESSION
$_SESSION['pseudo'] = $_POST['pseudo'];
$_SESSION['pass'] = $_POST['pass'];

?>

<?php
if ( isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == "florian" AND isset($_SESSION['pass']) AND $_SESSION['pass'] == "teso")
{
?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page -->
		<link rel="stylesheet" href="style.css" />
		<meta charset="utf8" />
		<title>Bieres</title>
	</head>

	<body>
	
		<h1>Espace de modification de la base de donnée</h1>

	
	<a href="data.php"><img  class=bdd src="images/bdd.png"/></a>
		
	</body>
	
	<footer>
				Site Web en developpement - Ecole Centrale de Lyon - 36 Avenue Guy de Collongue 69134 Ecully
	</footer>
	
</html>
	
	
<?php
}
else
{
	echo '<p>Mot de passe incorrect</br><a href="site.html">Veuillez réessayer</a></p>';
}
?>
