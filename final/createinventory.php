<?php

    require_once 'source/session.php';
    require_once 'source/db_connect.php';

    $userid = $_SESSION['id'];

        if(isset($_POST['projectup-btn'])) {
            $inventorytype = $_POST['inventorytype'];
            $inventoryname = $_POST['inventoryname'];
            $inventorydesc = $_POST['inventorydesc'];
            $inventoryid = $_POST['inventoryid'];
            $manufacturer = $_POST['manufacturername'];

          try {
              $SQLInsert = "INSERT into addinventory( inventorytype, inventoryname, inventorydesc, inventoryid, manufacturer, userid) VALUES ('$inventorytype','$inventoryname','$inventorydesc','$inventoryid','$manufacturer','$userid')";

            $statement = $conn->prepare($SQLInsert);
            $statement->execute();
            echo '<script>alert("Inventory added Successfully. Press Back to see it in table")</script>';
          }
          catch(PDOException $e)
            {
            echo $SQLInsert . "<br>" . $e->getMessage();
            }
        }
?>