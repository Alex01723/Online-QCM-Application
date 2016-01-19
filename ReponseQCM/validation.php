<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15/01/2016
 * Time: 15:47
 */
include "../assets/DBConnect.php";

$coordonnees = $DB->query("SELECT * FROM utilisateur WHERE id=" . $_SESSION["idUtilisateur"])->fetch(PDO::FETCH_OBJ);
$mail_to = $coordonnees->courriel;
$idQCM = $_POST['idQCM'];
$file_name = $coordonnees->nom . "_" . $coordonnees->prenom . "-" . $idQCM . ".txt";
include "mailTo.php";
$qcm_question = $DB->query("SELECT * FROM qcm_question WHERE idQcm=" . $idQCM)->fetchAll(PDO::FETCH_OBJ);
$file = fopen($file_name, "a");
$reponse = $_POST['reponse'];

foreach ($reponse as $numeroQuestion => $value) {
    $bonneReponse = $qcm_question[$numeroQuestion]->bonneReponse;
    if ($reponse[$numeroQuestion][1] == "on")
        $reponseBin += 1000;
    if ($reponse[$numeroQuestion][2] == "on")
        $reponseBin += 100;
    if ($reponse[$numeroQuestion][3] == "on")
        $reponseBin += 10;
    if ($reponse[$numeroQuestion][4] == "on")
        $reponseBin += 1;


    $bonneReponse = $DB->query("SELECT bonneReponse FROM qcm_question WHERE idQcm=$idQCM AND id=" . $_POST[idQuestion][$numeroQuestion])->fetch(PDO::FETCH_OBJ)->bonneReponse;


    $AND = decbin($bonneReponse & $reponseBin);
    $nbDeBonnesReponses = substr_count($bonneReponse, 1);
    $pts += substr_count($AND, 1) / $nbDeBonnesReponses;


    $reponses = $DB->query("SELECT * FROM qcm_question WHERE idQcm=$idQCM AND id=" . $_POST[idQuestion][$numeroQuestion])->fetch(PDO::FETCH_OBJ);
    $correction .= $reponses->question;
    $correction .= "<br>Reponse 1 : " . $reponses->reponse1;
    $correction .= "<br>Reponse 2 : " . $reponses->reponse2;
    $correction .= "<br>Reponse 3 : " . $reponses->reponse3;
    $correction .= "<br>Reponse 4 : " . $reponses->reponse4;
    $correction .= "<br>Réponses de l'elève " . $reponseBin;
    $correction .= "Bonne réponse " . $bonneReponse;
    $correction .= "Nombre de bonnes reponses (Bin)(&logique) " . $AND . " Nombre de bonnes reponses (Dec) " . $nbDeBonnesReponses;
    $correction .= " Points pour cette question " . $pts;
    //echo $correction;
    $nombreDeQuestions++;

    fwrite($file, $correction);
}

$Note = ($pts * 20) / $nombreDeQuestions;
//echo "Note sur 20 :" . $Note;
$DB->exec("INSERT INTO qcm_eleve VALUES(Null,'" . $idQCM . "','" . $_SESSION[idUtilisateur] . "','" . $Note . "')");
fclose($file);
mail($mail_to, $subject, $message, $entete);
header("Location:../AffichageNotes/notes_eleves.php");