<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
				$requete=$bdd->prepare("SELECT mot_de_passe FROM Personne WHERE mail='".$_POST['mail']."'");
				$requete->execute();
				//var_dump($requete);
				if($requete->rowCount()!=0){
					$requete2=$bdd->prepare("SELECT id FROM Personne WHERE mail='".$_POST['mail']."'" ." and mot_de_passe='".$_POST['mot_de_passe']."'");
					$requete2->execute();
					//var_dump($requete2);
					if($requete2->rowCount()!=0){ 
						$requete3=$bdd->prepare("SELECT prenom FROM Personne WHERE mail='".$_POST['mail']."'" ." and mot_de_passe='".$_POST['mot_de_passe']."'");
						$requete3->execute();
						$prenom = $requete3->fetchColumn();
						$requete4=$bdd->prepare("SELECT nom FROM Personne WHERE mail='".$_POST['mail']."'" ." and mot_de_passe='".$_POST['mot_de_passe']."'");
						$requete4->execute();
						$nom = $requete4->fetchColumn();

						echo "Bonjour ".$prenom." ".$nom;
						$_SESSION['mail']=$_POST['mail'];
						$_SESSION['mot_de_passe']=$_POST['mot_de_passe'];
						$_SESSION['prenom']=$prenom;
						$_SESSION['nom']=$nom;
						echo ' <br><a href="index.php">Acces au site <a/>';
					}
				}else{echo 'L Email n existe pas  <br><a href="Connexion.html">Retour Inscription <a/>';}
			}else{echo 'L Email est incorrect <br><a href="Connexion.html">Retour Inscription <a/>';}
		

		
	}
	catch(PDOException  $e)

	{
		echo 'Erreur PDO : ' . $e->getMessage();
        //die('Erreur : '.$e->getMessage());

	}
php?>	