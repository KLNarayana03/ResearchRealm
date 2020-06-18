<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];
   $query = "DELETE FROM projectexpenses WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
        echo '<script>alert("Bill deleted Successfully!")</script>';
   }
   else
   {
    echo '<script>alert("Bill FAILED to delete!")</script>';
   }
?>