<li id=cadre>
	<a id=indic href="detail.php?page=<?php echo $a['id']; ?>">
		<div id=nom><?php echo $a['nom']; ?></div>
			<img src="<?php echo $photo; ?>" width="100%" height="90%"/>
		<table id=prix> 
			<tr id=inf>
			<td id=info><?php echo $a['note']; ?></td>
			<td id=info><?php echo ''; ?><?php echo $a['prix']; ?>€  </td>
			<td id=info><?php echo $a['degre']; ?>°</td>
			</tr>
		</table>
	</a> 
</li>
