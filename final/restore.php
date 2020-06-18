<?php
   include_once 'source/db_connect.php';
   include_once 'source/session.php';

   $id = $_GET['rn'];

   $query = "INSERT INTO projects (id, projectname, projecttype, projectdesc, projectdate, userid) SELECT id, projectname, projecttype, projectdesc, projectdate, userid FROM recyclebin WHERE id = $id";
   $result_insert =$conn->prepare($query);
   $result_insert->execute();

   $query = "DELETE FROM recyclebin WHERE id = $id";
   $result_delete =$conn->prepare($query);
   $result_delete->execute();

   if($result_delete)
   {
       echo "Project Restored Successfully";
   }
   else
   {
       echo "Project failed to delete";
   }
?>