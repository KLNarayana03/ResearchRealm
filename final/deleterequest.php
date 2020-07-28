<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "DELETE FROM inviterequest WHERE userid = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
    echo '<script>alert("Request rejected Successfully!")</script>';
    header( "refresh:1;url=pendingrequests.php" );
   }
   else
   {
    echo '<script>alert("Request not rejected!")</script>';
   }
?>