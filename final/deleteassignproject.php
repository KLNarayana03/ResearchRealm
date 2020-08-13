<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "DELETE FROM assign WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
        echo '<script>alert("Deleted from database Successfully!")</script>';
        header( "refresh:1;url=allprojects.php" );
   }
   else
   {
       echo '<script>alert("Failed to delete!")</script>';
   }
?>