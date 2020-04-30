<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

if(isset($_POST['projectup-btn'])) {
    $id = $_SESSION['id'];
    $calendarentryname = $_POST['calendarentryname'];
    $calendarentrytype = $_POST['calendarentrytype'];
    $calendarentrylastdate = $_POST['calendarentrylastdate'];
    $calendarentrydesc = $_POST['calendarentrydesc'];

  try {
    if($calendarentryname!=""){
      $SQLInsert = "INSERT into createcalendarentries(calendarentryname, calendarentrytype , calendarentrylastdate, calendarentrydesc, calendarentrydate, userid) VALUES ('$calendarentryname','$calendarentrytype', '$calendarentrylastdate', '$calendarentrydesc',curdate(), '$id')";

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