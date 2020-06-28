<?php
    $dbh = new PDO("mysql:host=localhost;dbname=calendar","root","");
    $id = isset($_GET['id'])? $_GET['id'] : "";

    $query = $dbh->prepare("select * from events where id=?");
    $query->bindParam(1,$id);
    $query->execute();
    $rows = $query->fetch();
    header('content-Disposition: inline; filename = '.$rows['path'].'');
    header('Content-Type:application/octent-system');
    // echo $rows['resources'];
    @readfile($rows['path']);
?>