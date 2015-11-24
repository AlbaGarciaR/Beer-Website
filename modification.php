<?php

$dbh = new PDO('mysql:host=localhost;dbname=site','root','root');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	  $id = $_POST['id'];
      $nom = $_POST['nom'];
      $origine = $_POST['origine'];
      $robe = $_POST['robe'];
	  $degre = $_POST['degre'];
      $frc = $_POST['frc'];
      $brasserie = $_POST['brasserie'];
	  $note = $_POST['note'];
      $arome = $_POST['arome'];
      $style = $_POST['style'];
	  $prix = $_POST['prix'];
	  $photo = $_POST['photo'];

	  
	  $req = $dbh->prepare('UPDATE bieres SET nom=:nom, origine=:origine, robe=:robe, degre=:degre, frc=:frc,
	  brasserie=:brasserie, note=:note, arome=:arome, style=:style, prix=:prix, photo=:photo WHERE id= :id');

	$req->execute(array(
		'id' => $id,
		'nom' => $nom,
		'origine' => $origine,
		'robe' => $robe,
		'degre' => $degre,
		'frc' => $frc,
		'brasserie' => $brasserie,
		'note' => $note,
		'arome' => $arome,
		'style' => $style,
		'prix' => $prix,
		'photo' => $photo	
		));

$r = $dbh->prepare('SELECT * FROM bieres WHERE id=:id');
$r->execute(array('id' => $id));	
		

echo 'La bière a bien été ajoutée !';

}

if(isset($_GET['biere']) AND isset($_GET['modif'])){
$biere=$_GET['biere'];
$modif=$_GET['modif'];
}

if($modif='modification' AND isset($biere)){
$r = $dbh->prepare('SELECT * FROM bieres WHERE id=:id');
$r->execute(array('id' => $biere));
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

<ul id=fond>
<h1>Notre liste de Bières</h1>

<table>
 
 <tr>
 <th>Nom</th><th>Origine</th><th>Robe</th><th>Degré</th><th>Force</th><th>Brasserie</th><th>Note</th><th>Arôme</th><th>Style</th><th>Prix au litre</th><th>Photo</th>
 </tr>
 
 <?php
  foreach( $r as $a ) {
    echo '<tr><td>'.$a['nom'].'</td><td>'.$a['origine'].'</td><td>'.$a['robe'].'</td>
	<td>'.$a['degre'].'</td><td>'.$a['frc'].'</td><td>'.$a['brasserie'].'</td><td>'.$a['note'].'</td>
	<td>'.$a['arome'].'</td><td>'.$a['style'].'</td><td>'.$a['prix'].'</td><td>'.$a['photo'].'</td></tr>';
	
	$nom = $a['nom'];
    $origine = $a['origine'];
    $robe = $a['robe'];
	$degre = $a['degre'];
    $frc = $a['frc'];
    $brasserie = $a['brasserie'];
	$note = $a['note'];
    $arome = $a['arome'];
    $style = $a['style'];
	$prix = $a['prix'];
	$photo = $a['photo'];
	
 }
 ?>
 
</table>

<h1>Modifier Bière</h1>
<div id=tableau>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

		<input type="hidden" name="id" value="<?php echo $biere ?>"><br />
  <span>Nom</span>
		<input type="text" name="nom" value="<?php echo $nom ?>"><br />
  <span>Origine</span>
		<input type="text" name="origine" value="<?php echo $origine ?>"><br />
  <span>Robe</span>
		<input type="text" name="robe" value="<?php echo $robe ?>"><br />
  <span>Degré</span>
		<input type="number" min=0 max=100 step=0.1 name="degre" value="<?php echo $degre ?>"><br />
  <span>Force</span>
		<select name="frc">
		<option value="Faible">Faible</option>
		<option value="Moyenne">Moyenne</option>
		<option value="Forte">Forte</option>
		<option value="Extrème">Extrème</option>
		</select><br />
  <span>Brasserie</span>
  <input type="text" name="brasserie" value="<?php echo $brasserie ?>"><br />
  <span>Note</span>
  <input type="text" name="note" value="<?php echo $note ?>"><br />
  <span>Arôme</span>
  <input type="text" name="arome" value="<?php echo $arome ?>"><br />
  <span>Style</span>
  <input type="text" name="style" value="<?php echo $style ?>"><br />
  <span>Prix au litre</span>
  <input type="number" min=0 max=300 step=0.01 name="prix" value="<?php echo $prix ?>"><br />
  <span>Photo</span>
  <input type="text" name="photo" value="<?php echo $photo ?>"><br />
  
  <div id=valider><input id=valid type="submit" name="submit" value="Modifier"></div>
  
</form>
</div>
</ul>
</html>
