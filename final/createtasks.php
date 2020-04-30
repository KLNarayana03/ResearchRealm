<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

if(isset($_POST['projectup-btn'])) {
    $id = $_SESSION['id'];
    $taskname = $_POST['taskname'];
    $tasktype = $_POST['tasktype'];
    $tasklastdate = $_POST['tasklastdate'];
    $taskdesc = $_POST['taskdesc'];

  try {
    if($taskname!=""){
      $SQLInsert = "INSERT into createtasks(taskname, tasktype , tasklastdate, taskdesc, taskdate, userid) VALUES ('$taskname','$tasktype', '$tasklastdate', '$taskdesc',curdate(), '$id')";

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