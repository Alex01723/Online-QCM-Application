<?php
session_start();
include "../assets/DBConnect.php";
include "../assets/header.php";

$sql = " SELECT id,titre, dateLimite FROM qcm WHERE idGroupe=(SELECT idGroupe FROM utilisateur u LEFT JOIN groupe g ON g.id=u.groupe WHERE u.id=2) AND id NOT IN (SELECT idQCM FROM qcm_eleve WHERE idEleve=\"$_SESSION[idUtilisateur]\")";
//echo $sql;
$res = $DB->query($sql);
//var_dump($res);
?>
<div class="wrapper">
    <div class="container">
        <div class="tableau">
            <h1>QCM Disponibles</h1>
            <?php
            if ($res->rowCount() == 0)
                echo "<h2 align='center'>Il n'y à aucun QCM de disponnible</h2>" ?>
            <table>
                <thead>
                <tr class="tbl-header-footer">
                    <th>Nom QCM</th>
                    <th>Delai de remplissage</th>
                    <th>Note</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr><td id="nom">' . $row["titre"] . '</td>';
                    echo '<td id="date" >' . strftime("%D", strtotime($row['dateLimite'])) . '</td>';
                    echo '<td><a href="../ReponseQCM/qcm.php?id=' . $row["id"] . '">A faire</a></td>';
                    echo '</tr>';
                }

                ?></tbody>
            </table>

        </div>
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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="PHP QCM Kévin/js/index.js"></script>


</body>
</html>
