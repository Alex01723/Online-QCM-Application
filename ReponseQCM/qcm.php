<!DOCTYPE html>
<?php
session_start();
$_SESSION['id'] = 2;
include "../assets/DBConnect.php";
include "../assets/header.php";
//include('validation.php');
$point = 0;
$TitreDuQCM = $DB->query("SELECT titre FROM `qcm` WHERE id = " . $_GET['id'] . ";")->fetch()['titre'];
$QuestionsReponses = $DB->query("SELECT id, question, reponse1,reponse2,reponse3,reponse4 FROM qcm_question WHERE idQcm=" . $_GET['id'] . ";")->fetchAll();
?>
<style>
    div#right {
        display: inline-block;
    }

    div#left {
        display: inline-block;
    }

    input[type="checkbox"] {
        margin: 10px;
        margin-top: 5px;
        width: 15px;
        height: 15px;
    }

    td {
        display: inline-flex;
        width: 50%;
    }
</style>

<div class="wrapper">
    <div class="container">
        <h1><?php echo $TitreDuQCM; ?></h1>

        <form method="post" action="validation.php">
            <table>
                <?php
                foreach ($QuestionsReponses as $numeroQuestion => $question) {
                    echo "<tr style='width: 50%'><tdcolspan=\"2\">" . $QuestionsReponses[$numeroQuestion]['question'] . "</td></tr>";
                    echo "<br>" .
                        "<tr><td><input type='checkbox' value='on' name='reponse[" . $numeroQuestion . "][1]' required>" .
                        $QuestionsReponses[$numeroQuestion]['reponse1'] . "</td>
                    <td><input type='checkbox' value='on' name='reponse[" . $numeroQuestion . "][2]' required>" .
                        $QuestionsReponses[$numeroQuestion]['reponse2'] . "</td></tr>" .
                        "<tr><td><input type='checkbox' value='on' name='reponse[" . $numeroQuestion . "][3]' required>" .
                        $QuestionsReponses[$numeroQuestion]['reponse3'] . "</td>
                    <td><input type='checkbox' value='on' name='reponse[" . $numeroQuestion . "][4]' required>" .
                        $QuestionsReponses[$numeroQuestion]['reponse4'] . "</td></tr>";
                    echo "<input type='hidden' name='idQuestion[" . $numeroQuestion . "]' value='" . $QuestionsReponses[$numeroQuestion]['id'] . "'>";
                }
                ?>
                <tfoot>
                <tr>
                    <input type="hidden" name="idQCM" value="<? echo $_GET['id'] ?>">
                    <td><input type="submit" value="Valider"></td>
                </tr>
                </tfoot>

            </table>

        </form>
    </div>
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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
