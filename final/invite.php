<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

$projectid = $_GET['rn'];
$userid = $_SESSION['id'];
//Query for displaying in invites
$query = "select * from users where id != $userid";
$result_assign = $conn->prepare($query);
$result_assign->execute();

?>
<html>
    <style>
        hr.new1 {
border: 1.5px solid #43A047;
border-radius: 2px;
margin-top: 0px;
margin-bottom: 18px;
}

#projecttype {
  width: 100%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}

.projectdescription {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  margin-top: 18px;
}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
background-color: #43A047;
color: white;
padding: 12px;
font-size: 18px;
border: none;
cursor: pointer;
width: auto;
position: fixed;
top: 15vh;
left: 38.5vw;
}

/* The popup form - hidden by default */
.form-popup {
display: none;
z-index: 9;
position: fixed;
width: 600px;
top: 21.6vh;
left: 38vw;
}

/* Add styles to the form container */
.form-container {
padding: 10px;
background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
width: 100%;
padding: 15px;
margin: 5px 0 22px 0;
border: none;
background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
background-color: #ddd;
outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
background-color: #4CAF50;
color: white;
padding: 16px 20px;
border: none;
cursor: pointer;
width: 100%;
margin-top: 18px;
margin-bottom:0px;

}

/* Add a red background color to the cancel button */
.form-container .cancel {
background-color: rgba(255, 17, 0, 0.788);
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
opacity: 0.9;
}

    </style>
    <form action="" class="form-container" method="post">
        <label style="font-size:15.5px;">Invite: &nbsp &nbsp </label>
        <select for="receivername" id="receivername" name="receivername">
        <?php 
            while($rows=$result_assign->fetch(PDO::FETCH_ASSOC))
            {
                    $invitename = $rows['username'];
                    echo "<option>$invitename</option>";  
            }
        ?>
        </select>
        <input type="submit" name="projectup-btn" class="btn" value="Submit">
    </form>  

</html>
<?php
if(isset($_POST['projectup-btn'])) {
    $receivername = $_POST['receivername'];
    $sno = 0;
    //Query for checking that names are not repeated
    $result_check_repetition = $conn->prepare("SELECT * FROM inviterequest WHERE receivername = :receivername AND projectid = :projectid");
    $result_check_repetition->bindParam(':receivername', $receivername);
    $result_check_repetition->bindParam(':projectid', $projectid);
    $result_check_repetition->execute();

    if($result_check_repetition->rowCount()>0){
      echo "<div style = \" text-align: center; position: absolute; top: 50%; left: 50%;\">$receivername is already invited for this project</div>";
    }
    else{
      try {
          $SQLInsert = "INSERT INTO inviterequest(projectid, receivername ,curstatus, userid) VALUES ($projectid,'$receivername',$sno,$userid)";    
        $statement = $conn->prepare($SQLInsert);
        $statement->execute();
        echo '<script>alert("Invited Successfully. Press Back to see it in table")</script>';
      }
      catch(PDOException $e)
        {
        echo $SQLInsert . "<br>" . $e->getMessage();
        }
    }
}

?>
