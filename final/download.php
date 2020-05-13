<?php
    include_once 'source/db_connect.php';
    include_once 'source/session.php';

    $id = $_GET['id'];
    $query = "select * from resources";
    $result_resources_download =$conn->prepare($query);
    $result_resources_download->execute();

    while($rows=$result_resources_download->fetch(PDO::FETCH_ASSOC)){
        $path = $rows['path'];
        header('content-Disposition: attachment; filename = '.$path.'');
        header('content-type:application/octent-system');
        header('content-length='.filesize($path));
        readfile($path);
    }
?>