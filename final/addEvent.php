<?php
include_once './source/db_connect.php';
include_once './source/session.php';
// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$userid = $_SESSION['id'];
	$resource = $_FILES["fileToUpload"]["name"];

	$target = "./uploads/".$resource;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target);
	$sql = "INSERT INTO events(title, start, end, color,userid, resources, path) values ('$title', '$start', '$end', '$color',$userid, '$resource', '$target')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
