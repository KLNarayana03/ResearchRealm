<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

$userid = $_SESSION['id'];

$dbh = new PDO("mysql:host=localhost;dbname=www","root","");

if(isset($_POST['projectup-btn'])){
//     $target = "uploads/" . basename($_FILES["fileToUpload"]["name"]);
//     $resource = $_FILES["fileToUpload"]["name"];
//     $resourcedesc = $_POST["resourcedesc"];
//     $projectname = $_POST["projectname"];
//     $resourcetype = $_FILES["fileToUpload"]["type"];

// //     //moving uploaded files to the folder
// //     $target_dir = "uploads/"; //*****VERY IMPORTANT********its the folder in which file gets uploaded.....you can change it
// // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// // $uploadOk = 1;
// // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // // Check if image file is a actual image or fake image **********you can change this also if you wish
// // if(isset($_POST["submit"])) {
// //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
// //     if($check !== false) {
// //         echo "File is an image - " . $check["mime"] . ".";
// //         $uploadOk = 1;
// //     } else {
// //         echo "File is not an image.";
// //         $uploadOk = 0;
// //     }
// // }
// // // Check if file already exists
// // if (file_exists($target_file)) {
// //     echo "Sorry, file already exists.";
// //     $uploadOk = 0;
// // }

// // // Check if $uploadOk is set to 0 by an error
// // if ($uploadOk == 0) {
// //     echo "Sorry, your file was not uploaded.";
// // // if everything is ok, try to upload file
// // } else {
// //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
// //         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
// //     } else {
// //         echo "Sorry, there was an error uploading your file.";
// //     }
// // }
// move_uploaded_file($_FILES['fileToUpload']['name'],"uploads/".$_FILES['fileToUpload']['name']);
// $query = "INSERT INTO resources(projectname,resources,resourcedesc,resourcetype,userid) VALUES ('$projectname','$resource','$resourcedesc','$resourcetype','$userid')";
// $result_resource_insert =$conn->prepare($query);
// $result_resource_insert->execute();
    $resource = $_FILES["fileToUpload"]["name"];
    $resourcedesc = $_POST["resourcedesc"];
    $projectname = $_POST["projectname"];

    // $query1 = "select * from projects where projectname = $projectname";
    // $result_resources_projectid =$conn->prepare($query1);
    // $result_resources_projectid->execute();

    // $rows=$result_resources_projectid->fetch(PDO::FETCH_ASSOC);

    $query1 = $dbh->prepare("select * from projects where projectname=?");
    $query1->bindParam(1,$projectname);
    $query1->execute();
    $rows = $query1->fetch();

    $target = "./uploads/".$resource;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target);
    $query = "INSERT INTO resources(projectname,resources,resourcedesc,path,projectid) VALUES ('$projectname','$resource','$resourcedesc','$target','$rows[id]')";
    $result_resource_insert =$conn->prepare($query);
    $result_resource_insert->execute();
    echo $result_resource_insert->rowCount() . " Resource SHARED successfully to the project";
}
?>
