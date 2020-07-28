<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "UPDATE `inviterequest` SET `curstatus` = '1' WHERE userid = $id;";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
       echo "Request Accepted";
    //    header("Location: pendingrequests.php");
    //     exit();
        header( "refresh:1;url=pendingrequests.php" );
   }
   else
   {
       echo "Inventory failed to delete";
       header( "refresh:1;url=pendingrequests.php" );
   }
?>