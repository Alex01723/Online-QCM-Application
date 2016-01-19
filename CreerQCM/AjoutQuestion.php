<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15/12/2015
 * Time: 14:13
 */
$ListeDesGroupes = $DB->query("SELECT * FROM groupe WHERE id>0")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>html demo</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <LINK rel=STYLESHEET href="../PHP%20QCM%20Kévin/css/styles.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<article>

    <script src="/wp-includes/js/addInput.js" language="Javascript" type="text/javascript"></script>
    <form action="validation.php" method="POST">
        <table>

            <thead>
            <tr>
                <td><?php if ($_GET['status'] > 0)
                        echo "<div class='isa_success'>
                        <i class='fa fa-check'></i>
                        Votre questionnaire à bien été validé
                        </div>";
                    elseif ($_GET['status'] == '0')
                        echo '<div class="isa_error">
                        <i class="fa fa-times-circle"></i>
                        Il y a eu un problème avec votre questionnaire :/<br>Contactez l\'administrateur
                        </div>'; ?>
                </td>
            </tr>
            <tr>
                <td><p>Titre du QCM : <br>
                        <input type="text" name="titreDuQCM" style="width: 100%"><br>

                    <div style="display: inline-flex; "> Groupe interrogé :
                        <select name="groupe" id="groupe">
                            <?php
                            foreach ($ListeDesGroupes as $row) {
                                echo " <option value=" . $row["id"] . ".>" . $row["Nom"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    </p>
                    <input type="text" value="Entrez la date limite" name="dateLimite" id="datepicker">
                </td>

            </tr>
            </thead>
            <tbody id="dynamicInput">

            </tbody>
            <tfoot>
            <tr>
                <td>
                    <input type="button" style='float: left; width: 50%;' value="Ajouter une question"
                           onClick="addInput('dynamicInput');"
                           style="width: 50%;">
                    <input type="submit" value="Valider le questionnaire" style="width: 50%;float: right"><br></td>
            </tr>
            </tfoot>
        </table>


    </form>
</article>
<script>
    var counter = 0;
    function addInput(divName) {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "Question " + (counter + 1) + " <br>" +

            "<textarea name='question[" + counter + "]' style='width: 100%;' rows='5'>Entrez votre question et sélectionnez la bonne réponse en cochant la case accolé au champs de texte</textarea> " +
            "<br>" +
            "<div id='left'><input type='text' width='90' value='Entrez votre reponse' name='reponse[" + counter + "][1]' required> " +
            "<input type='checkbox' value='on' name='bonnereponse[" + counter + "][1]' required></div>" +
            "<div id='right'><input type='text' value='Entrez votre reponse' name='reponse[" + counter + "][2]' required> " +
            "<input type='checkbox'value='on' name='bonnereponse[" + counter + "][2]' required></div>" +
            "<br>" +
            "<div id='left'><input type='text' value='Entrez votre reponse' name='reponse[" + counter + "][3]' required> " +
            "<input type='checkbox' value='on' name='bonnereponse[" + counter + "][3]' required></div>" +
            "<div id='right'><input type='text' value='Entrez votre reponse' name='reponse[" + counter + "][4]' required> " +
            "<input type='checkbox' value='on' name='bonnereponse[" + counter + "][4]' required></div>" +
            "</tr> " +
            "<input type='hidden' name='nombreDeQuestions' value='" + (counter + 1) + "'>";
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
    addInput('dynamicInput');

    $(function () {
        $("#datepicker").datepicker();
    });

</script>

</body>
</html>