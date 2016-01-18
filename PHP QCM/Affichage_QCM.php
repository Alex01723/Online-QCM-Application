<!DOCTYPE html>
<?php
session_start();
$mysqli = new mysqli("localhost","root","","");
if ($mysqli->connect_errno) {
	echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$res = $mysqli-> query("SELECT distinct id,titre, idGroupe, date FROM QCM");

?>

<?php include("header.php"); ?>

<section>
	<div class="tbl-header" style="padding-right: 6px;">
		<table style="width:100%" cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<th>QCM</th>
					<th>Classe</th>
					<th>Delai</th>
					<th>Note</th>
				</tr>
			</thead>
		</table>
	</div>


	<div  class="tbl-content">
		<table style="width:100%" cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<?php
				while ($row = $res->fetch_assoc()) {
					echo '<tr>';
					echo '<td id="nom">'.$row["titre"].'</td>';
					echo setlocale(LC_TIME, "fr_FR");
					echo '<td id="groupecible"> '.$row["idGroupe"] .'</td>';
					echo '<td id="date" >'.strftime("%d-%m-%Y", strtotime($row["date"])).'</td>';
					echo '<td><a href="notes_qcm.php?id='.$row["id"].'">Note</a></td>';
					echo '</tr>';
				}

				?>

			</tbody>
		</table>
	</div>
</section>

<ul class="bg-bubbles">
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
</ul>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>