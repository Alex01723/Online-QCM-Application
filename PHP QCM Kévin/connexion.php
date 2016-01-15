<?php
if(isset($_POST['couriel'],$_POST['mdp'])){ 
// Hachage du mot de passe
//$pass_hache = sha1($_POST['pass']);
  $couriel=$_POST['couriel'];
  $mdp=$_POST['mdp'];

$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Vérification des identifiants
$req = $bdd->prepare('SELECT id FROM utilisateur WHERE couriel = :couriel AND mdp = :mdp');
$req->execute(array(
    'couriel' => $couriel,
    'mdp' => $mdp));

$resultat = $req->fetch();

if (!$resultat)
{
    //echo 'Mauvais identifiant ou mot de passe !';
    header("Location:index.php");
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['couriel'] = $couriel;
    header("Location:menu.php");
}
}
