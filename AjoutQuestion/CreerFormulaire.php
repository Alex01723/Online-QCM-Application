<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15/12/2015
 * Time: 14:13
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>html demo</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<article>
    <?php include "nouvelleQuestion.php" ?>

    <div id="0"></div>
</article>
<button id="ajout">Ajouter une question</button>
<input type="submit" value="Valider le questionnaire">
<script>
    var i = 2;
    $("#ajout").click(function () {
        console.log(i);
        $("div").load('nouvelleQuestion.php?numeroQuestion=' + i);
        $("article").append(" <div id=" + i + "></div>");
        i += 1
    });
</script>

</body>
</html>