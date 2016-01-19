<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>QCM</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div style="text-align: center;"><img src="../assets/logo-lyon1.png" style="text-align: center">
    <?php if (basename($_SERVER['PHP_SELF']) != 'menu.php') {
        echo "<form method=\"post\" action=\"../public/menu.php\">
	<button type=\"submit\" />Retour à l'espace personnel</button></form>";;
    } ?>

</div>

