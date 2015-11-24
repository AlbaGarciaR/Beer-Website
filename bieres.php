<?php
$dbh = new PDO('mysql:host=localhost;dbname=site','root','root');
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$choix=$_POST['choix'];
	$ordre=$_POST['ordre'];
}
else
{
	$choix=0;
	$ordre=0;
}

?>

<!DOCTYPE html>
<html>

<title>Bières</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf8">

<header>
<?php include("menu.php"); ?>
</header>

<?php

if ($choix == 1 AND $ordre == 1)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY nom"); 
}
elseif ($choix == 1 AND $ordre == 2)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY nom DESC"); 
}
elseif ($choix == 2 AND $ordre == 1)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY degre");
}
elseif ($choix == 2 AND $ordre == 2)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY degre DESC");
}
elseif ($choix == 3 AND $ordre == 1)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY note");
}
elseif ($choix == 3 AND $ordre == 2)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY note DESC");
}
elseif ($choix == 4 AND $ordre == 1)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY prix");
}
elseif ($choix == 4 AND $ordre == 2)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY prix DESC");
}
elseif ($choix == 5 AND $ordre == 1)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY origine");
}
elseif ($choix == 5 AND $ordre == 2)
{
$r = $dbh->query("SELECT * FROM bieres ORDER BY origine DESC");
}
else
{
$r = $dbh->query("SELECT * FROM bieres");
}
?>

<ul id=fond>
<h1>Notre liste de Bières</h1>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<?php echo("Ordonner par"); ?>
	<select name="choix">
		<option value="1">Nom</option>
		<option value="2">Degré</option>
		<option value="3">Note</option>
		<option value="4">Prix</option>
		<option value="5">Origine</option>
	</select>
<?php echo("de façon"); ?>
	<select name="ordre">
		<option value="1">Croissante</option>
		<option value="2">Décroissante</option>
	</select>
		
<input type="submit" name="submit" value="Ok">

</form></br>

		<?php
			$r = $r->fetchAll(PDO::FETCH_ASSOC);
			foreach( $r as $a ) { 
			$photo = $a['photo'];
			include("detail_biere.php");
			}
		?>
</ul>

<footer>
				</br></br></br></br>Site Web en developpement - Ecole Centrale de Lyon - 36 Avenue Guy de Collongue 69134 Ecully</br></br></br></br>
	</footer>

<html>
