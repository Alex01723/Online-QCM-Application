<?php 
session_start(); 
$mysqli = new mysqli("localhost", "root", "root", "test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    header('Location : index.php');
}
$point = 0;
if(!empty($_POST['questions'])){
    foreach($_POST['questions'] as $check){
        $result = $mysqli->query("SELECT valide FROM `qcm_reponse` WHERE id = ".$check.";");
        $verif = mysqli_fetch_row($result);
        if($verif[0] == 1){
            $point++;
        }else{
            $point = $point-0.5;
        }
    }
    echo $point;
}
$res = $mysqli->query("SELECT titre FROM `qcm` WHERE id = ".$_GET['id'].";");
$res->data_seek(0);
$title = $res->fetch_row();
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>QCM</title>
        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="wrapper">
    <style>
    .container{
        background: #A3B9B1;
        border-radius: 5px;
        border: 2px solid #A3B9B1;
        height: 100%;
    }
    p{
        margin-top: 5%;
    }
    input[type="submit"],input[type="reset"]{
        margin-top: 5%;
    }
    </style>
	<div class="container">
		<h1><?php echo $title[0]; ?></h1>
        <form method="post" action="qcm.php?id=<?php echo $_GET['id']; ?>">
		<?php 
        $i = 1;
        $res_a = $mysqli->query("SELECT * from qcm_question where idQcm = ".$_GET['id']."");
        while($row_a = $res_a->fetch_assoc()){
        echo '
        <p class="question">'.$row_a['question'].'</p>
        <ul class="answers">';
        
        $res = $mysqli->query("SELECT qcm_reponse.id,qcm_reponse.reponse from qcm_question inner join qcm_reponse on qcm_question.id = qcm_reponse.idQuestion where qcm_question.idQcm = ".$_GET['id']." and qcm_reponse.idQuestion = ".$i."");
        $res->data_seek(0);
        $question = 1;
        while ($row = $res->fetch_assoc()) {
            echo '
            <input type="checkbox" name="questions[]" value="'.$row['id'].'"><label for="q1a">'.$row['reponse'].'</label><br/>
            ';
            $question++;
        }
        echo '</ul>';
        $i++;
        }
        ?>
        <input type="submit" name="valid" value="Valider">
        <input type="reset" value="Annuler">
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
