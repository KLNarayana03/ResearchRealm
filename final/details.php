<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

$projectid = $_GET['rn'];
$userid = $_SESSION['id'];
$sno = 1;
//Query for displaying members
$query = "select * from assign where projectid = $projectid";
$result_invite =$conn->prepare($query);
$result_invite->execute();

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
<form action="#" method="#">   

    
    <div>
    <h5>Project Name: &nbsp &nbsp &nbsp &nbsp 
    <!-- php code for project name -->
    <?php
      $query = "select * from projects where userid = $userid and id = $projectid";
      $result_project =$conn->prepare($query);
      $result_project->execute();
      while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
        echo $rows['projectname'];
      }
        
    ?>
    </h5>
    </div><br>
    
    <div>
    <h5>Project Type: &nbsp &nbsp &nbsp &nbsp 
    <!-- php code for project type -->
    <?php
      $query = "select * from projects where userid = $userid and id = $projectid";
      $result_project =$conn->prepare($query);
      $result_project->execute();
      while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
        echo $rows['projecttype'];
      }
        
    ?>
    </h5>
    </div><br>

    <div>
    <h5>Project Start Date: &nbsp &nbsp &nbsp &nbsp 
    <!-- php code for project type -->
    <?php
      $query = "select * from projects where userid = $userid and id = $projectid" ;
      $result_project =$conn->prepare($query);
      $result_project->execute();
      while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
        echo $rows['projectdate'];
      }
        
    ?>
    </h5>
    </div><br>

    <div>
    <h5>Project Description :  </h5>
    <textarea class="projectdescription" style="height:100px"> 
    <?php
      $query = "select * from projects where userid = $userid and id = $projectid";
      $result_project =$conn->prepare($query);
      $result_project->execute();
      while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
        echo $rows['projectdesc'];
      }
        
    ?>
    </textarea>
    </div><br>

    <div>
    <h5>End Project: &nbsp &nbsp &nbsp &nbsp 
    <?php   
            $query = "select * from projects where userid = $userid and id = $projectid";
            $result_project =$conn->prepare($query);
            $result_project->execute();
            while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
                echo "
                <a href = 'delete.php?rn=$rows[id]' onclick=\"return confirm('Are you sure?')\">Delete</a>
                ";
                
              }
        ?>
    </h5>
    <!--php code for ending the project <a href = 'delete.php?rn=$rows[id]' onclick=\"return confirm('Are you sure?')\">Delete</a> -->
    </div><br>

    <div>
    <h5>Assign Project: &nbsp &nbsp &nbsp &nbsp 
    <?php   
            $query = "select * from projects where userid = $userid and id = $projectid";
            $result_project =$conn->prepare($query);
            $result_project->execute();
            while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
                echo "
                <a href = 'assign.php?rn=$projectid'>Assign</a>
                ";
                
              }
        ?>
    </h5>
    <!-- php code for assigning project -->
    </div><br>

    <div>
    <h5>Invite: &nbsp &nbsp &nbsp &nbsp 
    <?php   
            $query = "select * from projects where userid = $userid and id = $projectid";
            $result_project =$conn->prepare($query);
            $result_project->execute();
            while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
                echo "
                <a href = invite.php?rn=$projectid'>Invite</a>
                ";
                
              }
        ?>
    </h5>
    <!-- php code for assigning project -->
    </div><br>

    <div>
    <table style="width:600px;   line-height:40px; border: 1px solid #ddd;">
      <tr style="background-color:lightblue;">
        <th colspan="3" style="text-align:center;"><h3>Project Members</h3></th>  
      </tr>
      <tr>
        <th style="padding:5px; border: 1px solid #ddd;">S.No</th>
        <th style="padding:5px; border: 1px solid #ddd;">Name</th>
        <th style="padding:5px; border: 1px solid #ddd;">User Type</th> <!-- faculty,mentor,etc -->
      </tr>
      <?php
        while($rows=$result_invite->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tr>
            <td style=\"padding:5px; border: 1px solid #ddd;\">".$sno."</td>
            <td style=\"padding:5px; border: 1px solid #ddd;\">".$rows['username']."</td>
            <td style=\"padding:5px; border: 1px solid #ddd;\">".$rows['post']."</td>
            </tr>
            ";
            $sno++;
        }
        ?>

      <!-- php code for displaying project members-->  

    </table>
    </div><br>

  
  </form>
</div>
          
  <br>  

</html>

