<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 08/12/2015
 * Time: 15:20
 */
include "../assets/DBConnect.php";

//var_dump($_POST);

$DB->exec("INSERT INTO  qcm (`id` ,`titre` ,`idEnseignant` ,`idGroupe`,dateLimite)VALUES (NULL,'" . $_POST['titreDuQCM'] . "',1,'" . $_POST['groupe'] . "','" . date("Y-m-d", strtotime($_POST['dateLimite'])) . "');");
$idNouveauQCM = $DB->lastInsertId();
$questions = $_POST['question'];
$reponses = $_POST['reponse'];
$reponse = $_POST['bonnereponse'];

foreach ($questions as $numeroQuestion => $question) {
    $reponse1 = addslashes($reponses[$numeroQuestion][1]);
    $reponse2 = addslashes($reponses[$numeroQuestion][2]);
    $reponse3 = addslashes($reponses[$numeroQuestion][3]);
    $reponse4 = addslashes($reponses[$numeroQuestion][4]);

    $bonneReponse = 0;
    if ($reponse[$numeroQuestion][1] == "on")
        $bonneReponse += 1000;
    if ($reponse[$numeroQuestion][2] == "on")
        $bonneReponse += 100;
    if ($reponse[$numeroQuestion][3] == "on")
        $bonneReponse += 10;
    if ($reponse[$numeroQuestion][4] == "on")
        $bonneReponse += 1;
    $ajoutQuestionSQL = "INSERT INTO qcm_question (`idQcm` ,`question` ,`reponse1` ,`reponse2` ,`reponse3` ,`reponse4` ,`bonneReponse`)VALUES ('$idNouveauQCM','" . addslashes($question) . "','$reponse1','$reponse2','$reponse3','$reponse4','$bonneReponse')";
    //echo ($ajoutQuestionSQL) . "<br>";
    $ERR = $DB->exec($ajoutQuestionSQL);
    header("Location: index.php?status=$ERR");
    //echo $ERR;

}
//var_dump($idNouveauQCM);


