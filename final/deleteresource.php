<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "DELETE FROM resources WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
       echo "Resource deleted from database";
   }
   else
   {
       echo "Project failed to delete";
   }
?>