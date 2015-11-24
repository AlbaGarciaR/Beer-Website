<?php
$dbh = new PDO('mysql:host=localhost;dbname=site','root','root'); /*To make it work in Mac, need to write root inside the second ''. No need for Windows*/
?>

<!DOCTYPE html>

<html>

<title>Bières</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf8">

<header>
<?php include("menu.php"); ?>
</header>

<ul id=fond>
<h1>Chercher une Bière</h1></br></br>
<div id=tableau>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

  <span>Nom</span>
		<input type="text" name="nom"><br />
  <span>Origine</span>
		<input type="text" name="origine"><br />
  <span>Robe</span>
		<input type="text" name="robe"><br />
  <span>Degré</span>
		<input type="number" min=0 max=100 step=0.1 name="degre"><br />
  <span>Force</span>
		<select name="frc">
		<option value='%'>Indifférent</option>
		<option value="Faible">Faible</option>
		<option value="Moyenne">Moyenne</option>
		<option value="Forte">Forte</option>
		<option value="Extrème">Extrème</option>
		</select><br />
  <span>Brasserie</span>
  <input type="text" name="brasserie"><br />
  <span>Note</span>
  <input type="text" name="note"><br />
  <span>Arôme</span>
  <input type="text" name="arome"><br />
  <span>Style</span>
  <input type="text" name="style"><br />
  <span>Prix au litre</span>
  <input type="number" min=0 max=300 step=0.01 name="prix"><br />
  <span>Photo</span>
  <input type="text" name="photo"><br />
  
  <div id=valider><input id=valid type="submit" name="submit" value="Rechercher"></div>
  
</form>
</div>
</ul>
<?php

if(isset($_POST['nom'])){
if ($_POST['nom']!=NULL){$nom = $_POST['nom'];}
else{$nom = '%';}}
else{$nom = '%';}

if(isset($_POST['origine'])){
if ($_POST['origine']!=NULL){$origine = $_POST['origine'];}
else{$origine = '%';}}
else{$origine = '%';}

if(isset($_POST['robe'])){
if ($_POST['robe']!=NULL){$robe = $_POST['robe'];}
else{$robe = '%';}}
else{$robe = '%';}

if(isset($_POST['degre'])){
if ($_POST['degre']!=NULL){ $degre = $_POST['degre'];}
else{ $degre = '%';}}
else{ $degre = '%';}

if(isset($_POST['frc'])){
if ($_POST['frc']!=NULL){ $frc = $_POST['frc'];}
else{ $frc = '%';}}
else{ $frc = '%';}

if(isset($_POST['brasserie'])){
if ($_POST['brasserie']!=NULL){$brasserie = $_POST['brasserie'];}
else{$brasserie = '%';}}
else{$brasserie = '%';}

if(isset($_POST['note'])){
if ($_POST['note']!=NULL){$note = $_POST['note'];}
else{$note = '%';}}
else{$note = '%';}

if(isset($_POST['arome'])){
if ($_POST['arome']!=NULL){$arome = $_POST['arome'];}
else{$arome = '%';}}
else{$arome = '%';}

if(isset($_POST['style'])){
if ($_POST['style']!=NULL){$style = $_POST['style'];}
else{$style = '%';}}
else{$style = '%';}

if(isset($_POST['prix'])){
if ($_POST['prix']!=NULL){$prix = $_POST['prix'];}
else{$prix = '%';}}
else{$prix = '%';}

	/*$dbh = new PDO('mysql:host=localhost;dbname=site','root','');*/
	$r = $dbh->prepare('SELECT * FROM bieres WHERE nom LIKE :nom
											AND origine LIKE :origine
											AND robe LIKE :robe
											AND degre LIKE :degre
											AND frc LIKE :frc
											AND brasserie LIKE :brasserie
											AND note LIKE :note
											AND arome LIKE :arome
											AND style LIKE :style
											AND prix LIKE :prix ');
	$r->execute(array(
		'nom' => $nom,
		'origine' => $origine,
		'robe' => $robe,
		'degre' => $degre,
		'frc' => $frc,
		'brasserie' => $brasserie,
		'note' => $note,
		'arome' => $arome,
		'style' => $style,
		'prix' => $prix
	));
	$r = $r->fetchAll(PDO::FETCH_ASSOC);
?>


 <table>
 <tr>
 <th>Nom</th><th>Origine</th><th>Robe</th><th>Degré</th><th>Force</th><th>Brasserie</th><th>Note</th><th>Arôme</th><th>Style</th><th>Prix au litre</th>
 </tr>
 
 <?php
  foreach( $r as $a ) {
    echo '<tr><td><a id=indic href="detail.php?page='.$a['id'].';">'.$a['nom'].'</a>'.'</td><td>'.$a['origine'].'</td><td>'.$a['robe'].'</td>
	<td>'.$a['degre'].'</td><td>'.$a['frc'].'</td><td>'.$a['brasserie'].'</td><td>'.$a['note'].'</td>
	<td>'.$a['arome'].'</td><td>'.$a['style'].'</td><td>'.$a['prix'].'</td></tr>';
 }
 ?>
</table>


<footer>
				</br></br></br></br>Site Web en developpement - Ecole Centrale de Lyon - 36 Avenue Guy de Collongue 69134 Ecully</br></br></br></br>
	</footer>

<html>
