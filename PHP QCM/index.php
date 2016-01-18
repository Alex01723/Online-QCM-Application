<?php include("header.php"); ?>

<h1>Bienvenue</h1>
<form name="ismForm" id="ismForm" method="post" action="connexion.php">
	<input type="text" name="courriel" placeholder="Courriel">
	<input type="password" name="mdp" placeholder="Mot de passe">
	<input id="login-button" class="button" onclick="btnSearchClick();" type="button" id="search.x" name="search.x" value="Valider" autocomplete="off"/>

	<script>
    function submitForm() { // submits form
    	document.getElementById("ismForm").submit();
    }
    function btnSearchClick()
    {
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
<script src="js/index.js"></script>
</body>
</html>
