<?php
session_start();
$mysqli = new mysqli("localhost","root","root","test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$res = $mysqli-> query("SELECT distinct id,titre, idGroupe, date FROM QCM");

?>

<html >
<head>

    <meta charset="UTF-8">
    <title>QCM</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="wrapper">
    <div class="tableau">
		
		<table>
			<tr>
				<th>Nom QCM</th>
				<th>Classe cible</th>
				<th>Delai de remplissage</th>
				<th>Note</th>
			</tr>
			<?php
			while ($row = $res->fetch_assoc()) {
				echo '<tr>';
				echo '<td id="nom">'.$row["titre"].'</td>';
				//echo setlocale(LC_TIME, "fr_FR");
				echo '<td id="groupecible"> '.$row["idGroupe"] .'</td>';
				echo '<td id="date" >'.strftime("%d-%m-%Y", strtotime($row["date"])).'</td>';
				echo '<td><a href="qcm.php?id='.$row["id"].'">A faire</a></td>';
				echo '</tr>';
			}

			?>
		</table>

    </div>
<form method="post" style="text-align:center;" action="menu.php">
	<button type="submit" />Menu</button>
</form>
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

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>




</body>
</html>
