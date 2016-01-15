<!DOCTYPE html>
<?php
session_start();
$mysqli = new mysqli("localhost","root","","test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$res = $mysqli-> query("SELECT distinct id,titre, idGroupe, date FROM QCM");

?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <!-- A ENLEVER PLUS TARD -->
  <!-- <meta http-equiv="Refresh" content="3; url=http://localhost/test_tableau_qcm/test_1.php"> -->
  <title>QCM</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="images/qcm.png" />
</head>
<body>
  <div class="wrapper">
    <div class="container">

      <section>
        <!-- <h1>&nbsp;Relevé de notes :&nbsp;</h1> -->


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

</div>
</div>

<script src="../js/test1.js"></script>

</body>
</html>