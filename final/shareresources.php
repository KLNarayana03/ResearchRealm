<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

$userid = $_SESSION['id'];

$dbh = new PDO("mysql:host=localhost;dbname=www","root","");

if(isset($_POST['projectup-btn'])){

    $resource = $_FILES["fileToUpload"]["name"];
    $resourcedesc = $_POST["resourcedesc"];
    $projectname = $_POST["projectname"];


    $query1 = $dbh->prepare("select * from projects where projectname=?");
    $query1->bindParam(1,$projectname);
    $query1->execute();
    $rows = $query1->fetch();

    $target = "./uploads/".$resource;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target);
    $query = "INSERT INTO resources(projectname,resources,resourcedesc,path,projectid,userid) VALUES ('$projectname','$resource','$resourcedesc','$target','$rows[id]','$userid')";
    $result_resource_insert =$conn->prepare($query);
    $result_resource_insert->execute();
    echo $result_resource_insert->rowCount() . " Resource SHARED successfully to the project";
}
?>
