<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

if(isset($_POST['projectup-btn'])) {
    $id = $_SESSION['id'];
    $projectname = $_POST['projectname'];
    $projecttype = $_POST['projecttype'];
    $projectdesc = $_POST['projectdesc'];

  try {
    if($projectname!=""){
      $SQLInsert = "INSERT into projects(projectname, projecttype ,projectdesc, projectdate, userid) VALUES ('$projectname','$projecttype','$projectdesc',curdate(), '$id')";

    $statement = $conn->prepare($SQLInsert);
    $statement->execute();
    echo $statement->rowCount() . " records UPDATED successfully";
    }
  }
  catch(PDOException $e)
    {
    echo $SQLInsert . "<br>" . $e->getMessage();
    }
//   else{
//     echo '<script language="javascript">';
//     echo 'alert("something is wrong")';
//     echo '</script>';
//     }

}

?>