<?php
session_start();
include "../assets/DBConnect.php";
if (isset($_POST['courriel'], $_POST['mdp'])) {
    $courriel = addslashes($_POST['courriel']);
    $mdp = $_POST['mdp'];
    $sql = "SELECT * FROM utilisateur WHERE courriel ='" . $courriel . "' AND mdp ='" . md5($mdp) . "'";
    $resultat = $DB->query($sql)->fetch(PDO::FETCH_ASSOC);
    if (!$resultat) {
        echo '<div class="wrapper">
    <div class="container"><div class="isa_error">
                        <i class="fa fa-times-circle"></i>
                        Il y a eu un problème :/ Veuillez Réessayer
                        </div></div></div>';
    } else {
        $_SESSION['idUtilisateur'] = $resultat['id'];
        header("Location:menu.php");
    }

}
include("../assets/header.php");
?>


<h1>Bienvenue</h1>
<form name="ismForm" id="ismForm" method="post" action="index.php">
    <input type="text" name="courriel" placeholder="Courriel">
    <input type="password" name="mdp" placeholder="Mot de passe">
    <input id="login-button" class="button" onclick="btnSearchClick();" type="submit" id="search.x" name="search.x"
           value="Valider" autocomplete="off"/>

    <script>
        function submitForm() { // submits form
            document.getElementById("ismForm").submit();
        }
        function btnSearchClick() {
            if (document.getElementById("ismForm")) {
                setTimeout("submitForm()", 1200); // set timeout
            }
        }

    </script>

</form>
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
<script src="../js/index.js"></script>
</body>
</html>
