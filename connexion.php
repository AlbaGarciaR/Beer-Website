<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page -->
		<link rel="stylesheet" href="style.css" />
		<meta charset="utf-8" />
		<title>Bières</title>
	</head>

	<body>
				
<header>
<?php include("menu.php"); ?>
</header>

<ul id=fond>
<h1>Connexion</h1>
<div id=tableau>
<form method="post" action="traitement.php">


	<span>Pseudo :</span>
	<input type="text" name="pseudo" id="pseudo" />
	<span>Password :</span>
	<br/>
	<input type="password" name="pass" id="pass" />
	<div id=valider><input id=valid type="submit" value="Se Connecter" /></div>


</form>
</div>
<p>Veuillez remplir le formulaire</p>
</ul>
</body>
	
	<footer>
				</br></br></br></br></br>Site Web en developpement - Ecole Centrale de Lyon - 36 Avenue Guy de Collongue 69134 Ecully</br></br></br></br>
	</footer>
	
</html>
	
