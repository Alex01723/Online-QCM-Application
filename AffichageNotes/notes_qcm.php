<?php
session_start();
include("../assets/header.php");
include "../assets/DBConnect.php";


//$nbNotes=$DB->query("SELECT count(*) nbNotes FROM qcm_eleve WHERE idEleve='".$_SESSION['idUtilisateur']."'" )->fetch(PDO::FETCH_ASSOC)['nbNotes'];
//$nbNotes=$DB->query("SELECT count(*) nbNotes FROM qcm_eleve GROUP BY idQcm" )->fetch(PDO::FETCH_ASSOC)['nbNotes'];
//echo "<br>$sql";

$sql = "SELECT * FROM RecapitulatifNotes ";
$sql .= "ORDER BY " . $_GET['orderby'];
$ListeNotes = $DB->query($sql);
$ListeNotesIndividuelles = $DB->query("SELECT identite,groupe,avg(note) FROM RecapitulatifNotes GROUP BY identite");
?>
<div class="wrapper" style="float: left">
    <div class="container">
        <div id="releveGeneral">
            <section>
                <h1>Relevé de notes général </h1>

                <div>
                    <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                        <thead class="tbl-header-footer" style="padding-right: 6px;">
                        <tr>
                            <th><a href="notes_qcm.php?orderby=identite">Eleve</a></th>
                            <th><a href="notes_qcm.php?orderby=groupe">Groupe</a></th>
                            <th><a href="notes_qcm.php?orderby=titre">Titre</a></th>
                            <th><a href="notes_qcm.php?orderby=identiteEnseignant">Enseignant</a></th>
                            <th><a href="notes_qcm.php?orderby=note">Note</a></th>
                        </tr>
                        </thead>

                </div>
                <div class="tbl-content">
                    <tbodystyle
                    ="width:100%" cellpadding="0" cellspacing="0" border="0">
                    <?php
                    while ($line = $ListeNotes->fetch(PDO::FETCH_ASSOC)) {
                        $nbNotes++;
                        echo "<tr><td>";
                        echo $line['identite'];
                        echo "</td>";
                        echo "<td>";
                        echo $line['groupe'];
                        echo "</td>";
                        echo "<td>";
                        echo $line['titre'];
                        echo "</td>";
                        echo "<td>";
                        echo $line['identiteEnseignant'];
                        echo "</td>";
                        echo "<td>";
                        $moyenne += $line['note'];
                        echo $line['note'];
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot class="tbl-header-footer">
                    <tr>
                        <td>MOYENNE</td>
                        <td><?php echo round($moyenne = $moyenne / $nbNotes, 2) ?> </td>
                    </tr>
                    </tfoot>
                    </table>
                </div>
        </div>

    </div>
</div>

<div class="wrapper" style="float: right;">
    <div class="container">
        <div id="releveIndividuel" style="float: right;display: block">
            <section>
                <h1>Relevé de notes individuel </h1>

                <div>
                    <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                        <thead class="tbl-header-footer" style="padding-right: 6px; color:white;">
                        <tr>
                            <th><a>Eleve</a></th>
                            <th><a>Groupe</a></th>
                            <th><a>Note</a></th>
                        </tr>
                        </thead>

                </div>
                <div class="tbl-content">
                    <tbodystyle
                    ="width:100%" cellpadding="0" cellspacing="0" border="0">
                    <?php
                    $moyenne = 0;
                    $nbNotes = 0;
                    while ($line = $ListeNotesIndividuelles->fetch(PDO::FETCH_ASSOC)) {
                        $nbNotes++;
                        echo "<tr><td>";
                        echo $line['identite'];
                        echo "</td>";
                        echo "<td>";
                        echo $line['groupe'];
                        echo "</td>";
                        echo "<td>";
                        $moyenne += $line['avg(note)'];
                        echo $line['avg(note)'];
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot class="tbl-header-footer">
                    <tr>
                        <td>MOYENNE</td>
                        <td><?php echo round($moyenne = $moyenne / $nbNotes, 2) ?> </td>
                    </tr>
                    </tfoot>
                    </table>
                </div>
        </div>
    </div>
</div>
</fieldset>
</body>
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
<script src="../js/test1.js"></script>
</html>