<?php
session_start();
?>
<?php include("header.php"); ?>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req=$bdd->prepare("SELECT count(*) FROM qcm_eleve WHERE idEleve=".$_SESSION['id']."" );
$req->execute();
$req2=$bdd->prepare("SELECT idQcm,note FROM qcm_eleve WHERE idEleve=".$_SESSION['id']."" );
$req2->execute();
$nbr = $req->fetchColumn();
?>

<section>
    <h1>&nbsp;Relevé de notes :&nbsp;</h1>


    <div class="tbl-header" style="padding-right: 6px;">
        <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>QCM</th>
                    <th>Notes</th>
                </tr>
            </thead>
        </table>
    </div>


    <div  class="tbl-content">
        <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
            <tbody>

                <?php
                $ligne = 0;
                while($ligne = $req2->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>";
                    echo $ligne['idQcm'];
                    echo "</td>";
                    echo "<td>";
                    echo $ligne['note'];
                    echo "</td>";
                    echo "</tr>";
                    $ligne++;
                }
                ?>
            </tbody>
        </table>
    </div>
</fieldset>

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