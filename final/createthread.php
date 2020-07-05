<?php

    require_once 'source/session.php';
    require_once 'source/db_connect.php';

    $userid = $_SESSION['id'];

        if(isset($_POST['projectup-btn'])) {
            $threadname = $_POST['threadname'];
            $threaddesc = $_POST['threaddesc'];
            $date = date('y.m.d');

          try {
              $SQLInsert = "INSERT into discussion(threadname, threaddesc, from_user_id, `timestamp`) VALUES ('$threadname','$threaddesc','$userid','$date')";

            $statement = $conn->prepare($SQLInsert);
            $statement->execute();
            echo '<script>alert("New Thread Successfully Created. Press Back to see it in table")</script>';
          }
          catch(PDOException $e)
            {
            echo $SQLInsert . "<br>" . $e->getMessage();
            }
        }
?>