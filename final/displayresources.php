<?php

include_once 'source/db_connect.php';
include_once 'source/session.php';

$projectid= $_GET['projectid'];

$query = "select * from resources where projectid = $projectid";
$result_resources_display =$conn->prepare($query);
$result_resources_display->execute();
?>
<ol>
<?php
while($rows=$result_resources_display->fetch(PDO::FETCH_ASSOC)){
    // echo "<img src = 'uploads/".$rows['resource']."'>";
    echo "<li><a target ='_blank' href='view.php?id=".$rows['id']."'>".$rows['path']."</a></li>";
}
?>
</ol>
