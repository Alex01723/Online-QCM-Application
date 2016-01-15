<?php include("header.php"); ?>


<fieldset style="width:50%" id="field">
    <legend>&nbsp;Relevé de notes :&nbsp;</legend>

    <table style="width:100%">
        <th>IDQCM</th>
        <th>Notes</th>
        <th>idEleve</th>
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req=$bdd->prepare("SELECT count(*) FROM qcm_eleve WHERE idQCM=".$_GET['id']."" );
        $req->execute();
        $req2=$bdd->prepare("SELECT idQcm,note,idEleve FROM qcm_eleve WHERE idQCM=".$_GET['id']."");
        $req2->execute();
        $nbr = $req->fetchColumn();

        while($line = $req2->fetch(PDO::FETCH_ASSOC)){

            echo " <tr>";
            echo "<td>";
            echo $line['idQcm'];
            echo"</td>";
            echo"<td>";
            echo $line['note'];
            echo"</td>";
            echo"<td>";
            echo $line['idEleve'];
            echo"</td>";
            echo"</tr>";
        }
        ?>
    </table>
</fieldset>
</body>
</html>