<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 08/12/2015
 * Time: 15:20
 */
include "../DBConnect.php";
$idNouveauQCM = $DB->query("SELECT COUNT(idQcm) FROM qcm_question")->fetch();
var_dump($idNouveauQCM);

for ($i = 0; $i < $_POST['nombreDeQuestions']; $i++) {
    $ajoutQuestionSQL = "INSERT INTO qcm_question (`idQcm`, `question`) VALUES (\'$idNouveauQCM\', \'fd\');";
}

?>


