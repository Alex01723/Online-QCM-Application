<?php
session_start();
include "../assets/DBConnect.php";
include("../assets/header.php");
$Moyenne = "Moyenne : " . $DB->query("SELECT AVG(note) FROM qcm_eleve WHERE idEleve=$_SESSION[idUtilisateur]")->fetch(PDO::FETCH_NUM)[0];
$boolEstEnseignant = $DB->query("SELECT groupe FROM utilisateur WHERE id=$_SESSION[idUtilisateur]")->fetch(PDO::FETCH_NUM)[0] == 0;
if (!isset($_SESSION['idUtilisateur']))
    echo 1;
header("Location:index.php");
?>
<div class="wrapper">
    <div class="container">
        <h1>Espace Personnel</h1>
        <?php if ($boolEstEnseignant) {
            echo " <form method=\"post\" action=\"../AffichageNotes/notes_qcm.php?sort=identite\">
    <button type=\"submit\"/>Notes QCM</button></form>";
            echo " <form method=\"post\" action=\"../CreerQCM/index.php\">
    <button type=\"submit\"/>Creer QCM</button></form>";
        } else {
            echo "<br>$Moyenne";
            echo " <form method=\"post\" action=\"../AffichageNotes/notes_eleves.php\">
    <button type=\"submit\"/>Notes QCM</button></form>";
            echo " <form method=\"post\" action=\"../ReponseQCM/Affichage_QCM.php\">
    <button type=\"submit\"/>QCM à faire ! </button>
</form>";
        }
        ?>

        <form method="post" action="../public/index.php">
            <button type="submit"/>
            Déconnexion</button>
        </form>
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

