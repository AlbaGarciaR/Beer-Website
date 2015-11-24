<?php
$dbh = new PDO('mysql:host=localhost;dbname=site','root','root');
$r = $dbh->query("SELECT * FROM bieres WHERE prix<10 ORDER BY note DESC LIMIT 0, 5");
?>

<!DOCTYPE html>
<html>

<title>Mes Bières</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf8">

<header>
<?php include("menu.php"); ?>
</header>

<body>
<ul id=fond>

<h1>Notre Selection de Bières</h1>


	<ul id=ul_selec>
		<?php
			$r = $r->fetchAll(PDO::FETCH_ASSOC);
			foreach( $r as $a ) { 
			$photo = $a['photo'];
			include("detail_biere_selec.php");
			}
		?>
	</ul>
	
	<p>Découvrez les meilleures bières qualité/prix triées en permanence à l'aide d'un puissant algorithme !</p>
</ul>
</body>
<footer>
				</br></br></br></br>Site Web en developpement - Ecole Centrale de Lyon - 36 Avenue Guy de Collongue 69134 Ecully</br></br></br></br>
	</footer>
	
</html>
