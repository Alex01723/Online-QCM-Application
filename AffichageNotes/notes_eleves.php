<?php

session_start();
include("../assets/header.php");
include "../assets/DBConnect.php";
$nbNotes = $DB->query("SELECT count(*) nbNotes FROM qcm_eleve WHERE idEleve='" . $_SESSION['idUtilisateur'] . "'")->fetch(PDO::FETCH_ASSOC)['nbNotes'];
$ListeNotes = $DB->query("SELECT idQcm,note,titre FROM qcm_eleve qe LEFT JOIN qcm q ON qe.idQcm = q.id  WHERE idEleve='" . $_SESSION['idUtilisateur'] . "'");
?>
<div class="wrapper">
    <div class="container">
        <section>
            <h1>Relevé de notes </h1>

            <div>
                <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                    <thead class="tbl-header-footer" style="padding-right: 6px;">
                    <tr>
                        <th>QCM</th>
                        <th>Notes</th>
                    </tr>
                    </thead>

            </div>
            <div class="tbl-content">
                <tbodystyle
                ="width:100%" cellpadding="0" cellspacing="0" border="0">
                <?php
                while ($line = $ListeNotes->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>";
                    echo $line['titre'];
                    echo "</td><td>";
                    $moyenne += $line['note'];
                    echo $line['note'];
                    echo "</td></tr>";
                }
                ?>
                </tbody>
                <tfoot class="tbl-header-footer">
                <tr>
                    <td>MOYENNE</td>
                    <td><?php echo $moyenne = $moyenne / $nbNotes ?> </td>
                </tr>
                </tfoot>
                </table>
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