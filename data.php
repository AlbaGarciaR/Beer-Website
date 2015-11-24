<?php
$dbh = new PDO('mysql:host=localhost;dbname=site','root','root');

if(isset($_GET['biere']) AND isset($_GET['modif'])){
$biere=$_GET['biere'];
$modif=$_GET['modif'];
}

if($modif='suppression' AND isset($biere)){
$r = $dbh->prepare('DELETE FROM bieres WHERE id=:id');
$r->execute(array('id' => $biere));
echo'<alert>'.'Votre Bière a été SUPPRIMEE !'.'</alert>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	/*$dbh->query("INSERT INTO bieres SET ".
      "nom=".$dbh->quote($_POST['nom']).",".
      "origine=".$dbh->quote($_POST['origine']).",".
      "robe=".$dbh->quote($_POST['robe']).",".
	  "degre=".$dbh->quote($_POST['degre']).",".
      "frc=".$dbh->quote($_POST['frc']).",".
      "brasserie=".$dbh->quote($_POST['brasserie']).",".
	  "note=".$dbh->quote($_POST['note']).",".
      "arome=".$dbh->quote($_POST['arome']).",".
      "style=".$dbh->quote($_POST['style']).",".
	  "prix=".$dbh->quote($_POST['prix']).",".
	  "photo=".$dbh->quote($_POST['photo']).";");*/
	  

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

	$req = $dbh->prepare('INSERT INTO bieres (nom, origine, robe, degre, frc, brasserie, note, arome, style, prix, photo) 
	VALUES(:nom, :origine, :robe, :degre, :frc, :brasserie, :note, :arome, :style, :prix, :photo)');
	
	$req->execute(array(
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

echo 'La bière a bien été ajoutée !';

}
?>


<!DOCTYPE html>
<html>

<header>
<?php include("menu.php"); ?>
</header>

<title>Mes Bières</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf8">


<h1 id=titre_data>Mes Bières</h1>

<table><tr><th>Nom</th><th>Origine</th><th>Robe</th><th>Degré</th><th>Force</th><th>Brasserie</th><th>Note</th><th>Arôme</th><th>Style</th><th>Prix au litre</th><th>Modifications</th></tr>
<?php
  $r = $dbh->query("SELECT * FROM bieres");
  $r = $r->fetchAll(PDO::FETCH_ASSOC);
  foreach( $r as $a ) {
    echo '<tr><td>'.$a['nom'].'</td><td>'.$a['origine'].'</td><td>'.$a['robe'].'</td><td>'.$a['degre'].'</td><td>'.$a['frc'].'</td><td>'.$a['brasserie'].'</td>
	<td>'.$a['note'].'</td><td>'.$a['arome'].'</td><td>'.$a['style'].'</td><td>'.$a['prix'].'</td>
	<td><a href="modification.php?biere='.$a['id'].'&amp;modif=modification">'.'Modifier'.'</a>'.' / '.'<a href="data.php?biere='.$a['id'].'&amp;modif=suppression">'.'Supprimer'.'</a></td></tr>';
  }
?>
</table>

<section id=fond>
<h1>Ajouter une nouvelle Bière</h1>
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
  
  <div id=valider><input id=valid type="submit" name="submit" value="Ajouter"></div>
  
</form>
</div>
</section>
</html>
