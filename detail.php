<?php
$dbh = new PDO('mysql:host=localhost;dbname=site','root','root');

if (isset($_GET['page'])){
$id=$_GET['page'];}
else{$id=$_POST['page'];}

if(isset($_GET['page']) AND isset($_GET['modif'])){
$num=$_GET['id'];
$modif=$_GET['modif'];
}

if($modif='suppression' AND isset($num)){
$t = $dbh->prepare('DELETE FROM tag WHERE id=:id');
$t->execute(array('id' => $num));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tag = $_POST['tag'];

	$req = $dbh->prepare('INSERT INTO tag (biere, tag) VALUES(:biere, :tag)');
	
	$req->execute(array('biere' => $id,'tag' => $tag));}

$r = $dbh->prepare('SELECT * FROM bieres WHERE id=:id');
$r->execute(array('id' => $id));
$t = $dbh->prepare('SELECT * FROM tag WHERE biere=:id');
$t->execute(array('id' => $id));

?>

<!DOCTYPE html>

<html>

<title>Bières</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf8">

<header>
<?php include("menu.php"); ?>
</header>

<ul id=fond_detail>
<h1>Notre liste de Bières</h1>

<section>
<aside id=image_detail>
    <?php
    $r = $r->fetchAll(PDO::FETCH_ASSOC);
    foreach( $r as $a ) {
        $photo = $a['photo'];
    }
    ?>
    <div>
<img src="<?php echo $a['photo']; ?>" width="80%" height="80%"/>
</div>

</aside>

<article id=text_detail>
    <span>Nom : </span>
<?php echo $a['nom']; ?> </br>
    <span>Origine : </span>
<?php echo $a['origine']; ?> </br>
    <span>Robe : </span>
<?php echo $a['robe']; ?> </br>
    <span>Degré : </span>
<?php echo $a['degre']; ?>º</br>
    <span>Force : </span>
<?php echo $a['frc']; ?> </br>
    <span>Brasserie : </span>
<?php echo $a['brasserie']; ?> </br>
    <span>Note : </span>
<?php echo $a['note']; ?> </br>
    <span>Arôme : </span>
<?php echo $a['arome']; ?> </br>
    <span>Style : </span>
<?php echo $a['style']; ?> </br>
    <span>Prix au litre : </span>
<?php echo $a['prix']; ?> € </br>
</article>
</section>



<!--Affichage tags-->

    <aside>
        <div class='arrow_box'>
        <?php
            foreach( $t as $a ) {
                echo '<tr><td>'.$a['tag'].'</td><td><a href="detail.php?id='.$a['id'].'&amp;page='.$a['biere'].'&amp;modif=suppression">'.' '.'x'.'</br>'.'</a></td></tr>';
            }
        ?>
        </div>
    </aside>

<aside>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<input type="hidden" name="page" value="<?php echo $id ?>"><br />
<span>Tag</span>
<input type="text" name="tag"><br />


<input type="submit" name="submit" value="Ajouter">

</form>
</aside>
</ul>
</html>

