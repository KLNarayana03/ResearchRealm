<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "DELETE FROM projects WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
       echo '<script>alert("Project deleted Successfully!")</script>';
       header( "refresh:1;url=landingpage.php" );
   }
   else
   {
    echo '<script>alert("Project FAILED to delete!")</script>';
   }
?>