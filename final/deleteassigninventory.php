<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $projectid = $_GET['projectid'];
   $query = "DELETE FROM assigninventory WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
        echo '<script>alert("Inventory deleted Successfully!")</script>';
        header( "refresh:1;url=assigninventory.php?rn=$projectid" );
   }
   else
   {
        echo '<script>alert("Inventory FAILED to delete!")</script>';
   }
?>