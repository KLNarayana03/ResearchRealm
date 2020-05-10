<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "DELETE FROM addinventory WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
       echo "Inventory deleted from database";
   }
   else
   {
       echo "Inventory failed to delete";
   }
?>