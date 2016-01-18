<?php
session_start ();

// On détruit les variables de notre session
//session_unset ();

// On détruit notre session
session_destroy ();

include("header.php");
echo "Déconnecter !";


// On redirige le visiteur vers la page d'accueil
header ('Location:index.php');
?>
