<?php

include_once 'source/db_connect.php';
include_once 'source/session.php';

$projectid = $_GET['rn'];
$userid = $_SESSION['id'];
$sno = 1;
//Query for displaying members
$query = "select * from assign where projectid = $projectid";
$result_invite =$conn->prepare($query);
$result_invite->execute();


$projectid = $_GET['rn'];
$userid = $_SESSION['id'];
//Query for displaying in invites
$query = "select * from users where id != $userid";
$result_assign = $conn->prepare($query);
$result_assign->execute();


$id = $_SESSION['id'];
//query for displaying members
$query = "select * from assign";
$result_member =$conn->prepare($query);
$result_member->execute();
//query for displaying create->project table
$query = "select * from projects where userid = $id";
$result_project =$conn->prepare($query);
$result_project->execute();
//query for displaying create->tasks table
$query = "select * from createtasks where userid = $id";
$result_task =$conn->prepare($query);
$result_task->execute();
//query for displaying create->calendar enteries table
$query = "select * from createcalendarentries where userid = $id";
$result_calendar =$conn->prepare($query);
$result_calendar->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
 <title>Assign Project</title> 
<link rel="stylesheet" href="landingpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="font-awesome.css">
</head>
<body>

  <div class="header">

    <a href="landingpage.php" style="margin-left: 5px;">App logo</a>
    
    <div id="logout">Logout<a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-left: 15px;"></i></a></div>
    
    <div id="usertype">Faculty<a href="#"><i class="far fa-address-card" style="margin-left: 15px;"></i></a></div>
 </div>

<div class="row">

  <div class="sidenav" id="sidenav">
    
  <button class="dropdown-btn"><i class="fas fa-tasks" style="margin-right: 15px;"></i>Current Status
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>

  <button class="dropdown-btn"><i class='far fa-folder-open' style="margin-right: 20px;"></i>Create 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    
    <button class="dropdown-btn">Project 
        <!-- <i class="fa fa-caret-down"></i> -->
    </button>
      <div class="dropdown-container">
      <button class="open-formbutton" onclick="openForm()">Create new Project</button>
<div class="form-popup" id="myForm">
  <form action="createproject.php" class="form-container" method="post">

    <button class="open-button">Create new Project</button>  
    <hr class="new1">
    <input for="projectname" type="text" placeholder="Enter Project Name" name="projectname" required>
    <select for="projecttype" id="projecttype" name="projecttype">
    <option value="btp">B.Tech Project</option>
    <option value="mtp">M.Tech Project</option>
    <option value="phd">PhD Project</option>
    <option value="sponsored">Sponsored Project</option>
    <option value="internship">Internship Project</option>
    <option value="misc">Miscellaneous Project</option>
    </select>
    <textarea for="projectdesc" class="projectdescription" name="projectdesc" placeholder="Enter Project Description" style="height:200px"></textarea>

    <!-- <button type="submit" class="btn" name="projectup-btn">Submit</button> -->
    <input type="submit" name="projectup-btn" class="btn" value="Submit">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("main").style.display = "none";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("main").style.display = "block";
}
</script>
        <!-- <a href="#">B.Tech Project</a>
        <a href="#">M.Tech Project</a>
        <a href="#">PhD Project</a>
        <a href="#">Sponsored Project</a>
        <a href="#">Intern Project</a> -->
      </div>

      <button class="dropdown-btn">Tasks 
      <!-- <i class="fa fa-caret-down"></i> -->
      </button>
      <div class="dropdown-container">
        <button class="open-formbutton" onclick="openForm2()">Create new Task</button>
        <div class="form-popup" id="myForm2">
  <form action="createtasks.php" class="form-container" method="post">
    <button class="open-button">Create new Task</button>  
    <hr class="new1">
    <input for="taskname" type="text" placeholder="Enter Task Name" name="taskname" required>
    <select for="tasktype" id="projecttype" name="tasktype" style="margin-bottom:20px;">
    <option value="projectrelatedtask">Project Related Task</option>
    <option value="othertask">Other Task</option>
    </select>
    <label style="font-size:15.5px;">Task Deadline: &nbsp &nbsp </label>
    <input for="tasklastdate" type="date" name="tasklastdate" required>
    <textarea for="taskdesc" class="projectdescription" name="taskdesc" placeholder="Enter Task Description" style="height:200px"></textarea> 
    <input type="submit" name="projectup-btn" class="btn" value="Submit">
    <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
  </form>
  </div>

<script>
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
  document.getElementById("main").style.display = "none";
}

function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
  document.getElementById("main").style.display = "block";
}
</script>
      </div>

  <button class="dropdown-btn">Calendar Entries 
   <!-- <i class="fa fa-caret-down"></i>-->
  </button>
  <div class="dropdown-container">
  <button class="open-formbutton" onclick="openForm3()">New Calendar Entry</button>
        <div class="form-popup" id="myForm3">
  <form action="createcalendarentries.php" class="form-container" method="post">
    
  <button class="open-button">Create new Calendar Entry</button>  
    <hr class="new1">
    <input for="calendarentryname" type="text" placeholder="Title" name="calendarentryname" required>
    <select for="calendarentrytype" id="projecttype" name="calendarentrytype" style="margin-bottom:20px;">
    <option value="meetings">Meetings</option>
    <option value="deadlines">Deadlines</option>
    <option value="reminders">Reminders</option>
    </select>
    <label style="font-size:15.5px;">Date: &nbsp &nbsp </label>
    <input for="calendarentrylastdate" type="date" name="calendarentrylastdate" required>
    <textarea for="calendarentrydesc" class="projectdescription" name="calendarentrydesc" placeholder="Description" style="height:200px"></textarea> 
    <input type="submit" name="projectup-btn" class="btn" value="Submit">
    <button type="button" class="btn cancel" onclick="closeForm3()">Close</button>
  </form>
  </div>

<script>
function openForm3() {
  document.getElementById("myForm3").style.display = "block";
  document.getElementById("main").style.display = "none";
}

function closeForm3() {
  document.getElementById("myForm3").style.display = "none";
  document.getElementById("main").style.display = "block";
}
</script>
  </div>

  </div>

  <button class="dropdown-btn"><i class='far fa-edit' style="margin-right: 20px;"></i>Assign 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="assignproject.php" style="color:white;">Project 
     <!-- <i class="fa fa-caret-down"></i> -->
      </a>

      <button class="dropdown-btn">Tasks 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Project Deliverables</a>
        <a href="#">Others</a>
      </div>

      <button class="dropdown-btn">Inventory 
        <!--<i class="fa fa-caret-down"></i> -->
      </button>
      <div class="dropdown-container">
        
      </div>

  </div>

  
  <button class="dropdown-btn"><i class="far fa-calendar" style="margin-right: 20px;"></i>Fix
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <button class="dropdown-btn">Calendar Entries 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Meetings</a>
        <a href="#">Reminders</a>
        <a href="#">Deadlines</a>
      </div>
  </div>

  
  <button class="dropdown-btn"><i class="fas fa-share-alt" style="margin-right: 20px;"></i>Share 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <button class="open-formbutton" onclick="openshareform()">Resources</button>
 <div class="form-popup" id="shareform">
  <form action="shareresources.php" class="form-container" method="post" enctype="multipart/form-data">
    <button class="open-button">Share Resources</button>  
    <hr class="new1">

  <!-- code for selecting project in which we want to share resource-->
  <!-- I am writing a sample code-->
  <select for="project name" id="projecttype" name="projectname" style="margin-bottom:20px;">
    <?php
      $query = "select * from projects where userid = $id";
      $result_resource =$conn->prepare($query);
      $result_resource->execute();
      while($rows=$result_resource->fetch(PDO::FETCH_ASSOC)){
        $projectname = $rows['projectname'];
        echo "<option>$projectname</option>";
      }
    ?> 
  </select>
  
    
    <input  type="file" name="fileToUpload">
    <br>
    <textarea for="resourcedesc" class="projectdescription" name="resourcedesc" placeholder="Enter Resource Description (optional)" style="height:200px"></textarea>

    <!-- <button type="submit" class="btn" name="projectup-btn">Submit</button> -->
    <input type="submit" name="projectup-btn" class="btn" value="Share">
    <button type="button" class="btn cancel" onclick="closeshareform()">Close</button>
  </form>
 </div>
  <script>
  function openshareform() {
    document.getElementById("shareform").style.display = "block";
    document.getElementById("main").style.display = "none";
  }

  function closeshareform() {
    document.getElementById("shareform").style.display = "none";
    document.getElementById("main").style.display = "block";
  }
  </script>
</div>


  <button class="dropdown-btn"><i class="far fa-trash-alt" style="margin-right: 20px;"></i>End 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="assignproject.php" style="color:white;">Project 
     <!-- <i class="fa fa-caret-down"></i> -->
      </a>

      <button class="dropdown-btn">Tasks 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Project Deliverables</a>
        <a href="#">Others</a>
      </div>
  </div>

  
  <button class="dropdown-btn"><i class='far fa-comment-alt' style="margin-right: 20px;"></i>Interact
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Chat Box</a>
    <a href="#">Discussion Thread</a>
  </div>

  
  <button class="dropdown-btn"><i class='far fa-calendar-alt' style="margin-right: 20px;"></i>Remind 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Calendar Entries</a>
  </div>


  <button class="dropdown-btn"><i class="fa fa-line-chart" style="margin-right: 20px; font-size: 24px;"></i>Progress 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Project 1</a>
    <a href="#">Project 2</a>
    <a href="#">Project 3</a>
  </div>

  </div>

<div class="main" id="main">
<?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <!-- <?php echo "<h1> Welcome ".$_SESSION['username']." To Dashboard </h1>" ?> -->
  <div class="maincontent">
    <button class="topbutton">Assign Project</button>
    <hr class="new1">
    <div style="font-size:17.5px;">
    <b style="font-size:17.5px; font-weight:100;">Project Name : &nbsp</b> 
    <!-- php code for project name -->
    <?php
      $query = "select * from projects where userid = $userid and id = $projectid";
      $result_project =$conn->prepare($query);
      $result_project->execute();
      while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
        echo $rows['projectname'];
      }
        
    ?>
    </div><br>
    
    <div style="font-size:17.5px;">
    <b style="font-size:17.5px; font-weight:100;">Project Type : &nbsp </b>
    <!-- php code for project type -->
    <?php
      $query = "select * from projects where userid = $userid and id = $projectid";
      $result_project =$conn->prepare($query);
      $result_project->execute();
      while($rows=$result_project->fetch(PDO::FETCH_ASSOC)){
        echo $rows['projecttype'];
      }  
    ?>
    </div><br>

    <div>  
    <form action="" method="POST">
    <label style="font-size:17.5px; font-weight:100;">Select Name: &nbsp  </label>
    <select for="assignname" id="assignname" name="assignname">
        <?php 
            while($rows=$result_assign->fetch(PDO::FETCH_ASSOC))
            {
              $invitename = $rows['username'];
              echo "<option>$invitename</option>";
            }
        ?>
    </select>
    </div> <br>
    
    <div>
    <label style="font-size:17.5px; font-weight:100;">Assign Role: &nbsp </label>
    <select for="assignrole" id="assignrole" name="assignrole" style="margin-bottom:20px;">
      <option value="Collaborator">Collaborator</option>
      <option value="Lab-Incharge">Lab-Incharge</option>
      <option value="Mentor">Mentor</option>
    </select>
    </div><br>

    <input type="submit" name="projectup-btn" class="btn" value="Submit">
    </form>
       
    <div>
    <table style="width:95%; border: 1px solid #ddd;">
      <tr style="background-color:lightblue;">
        <th colspan="3" style="text-align:center;"><h3>Project Members</h3></th>  
      </tr>
      <tr>
        <th style="padding:5px; border: 1px solid #ddd; text-align:center;">S.No</th>
        <th style="padding:5px; border: 1px solid #ddd; text-align:center;">Name</th>
        <th style="padding:5px; border: 1px solid #ddd; text-align:center;">User Type</th> <!-- faculty,mentor,etc -->
      </tr>
      <?php
        while($rows=$result_invite->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tr>
            <td style=\"padding:5px; text-align:center; border: 1px solid #ddd;\">".$sno."</td>
            <td style=\"padding:5px; text-align:center; border: 1px solid #ddd;\">".$rows['username']."</td>
            <td style=\"padding:5px; text-align:center; border: 1px solid #ddd;\">".$rows['post']."</td>
            </tr>
            ";
            $sno++;
        }
        ?>

      <!-- php code for displaying project members-->  

    </table>
    </div><br>
          
  <br>       
</div>
</div>  



  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
  </script>
<script type="text/javascript">
    window.onload = function() {
        var left=document.getElementById('sidenav').clientHeight;
        var right=document.getElementById('main').clientHeight;
        if(left>right) {
           
            document.getElementById('main').style.height=left+"px";
        }
        if(left<right) {
            document.getElementById('sidenav').style.height=right+"px";
        }
    };
</script>



</div>

<div class="footer">
    <p class="copyright">Copyright © App Name. All Rights Reserved.</p>
</div>


</body>
</html>


<?php
        if(isset($_POST['projectup-btn'])) {
            $projectid = $_GET['rn'];
            $assignrole = $_POST['assignrole'];
            $assignname = $_POST['assignname'];
            
            // $result_check_repetition = $conn->prepare("select count(*) as num from `assign` where projectid = $projectid and username = $assignname");
            // $result_check_repetition->execute();
            // $row = $result_check_repetition->fetch(PDO::FETCH_ASSOC);

            $result_check_repetition = $conn->prepare("SELECT * FROM assign WHERE username = :assignname AND projectid = :projectid");
            $result_check_repetition->bindParam(':assignname', $assignname);
            $result_check_repetition->bindParam(':projectid', $projectid);
            $result_check_repetition->execute();
          if($result_check_repetition->rowCount()>0){
              echo "<div style = \" text-align: center; position: absolute; top: 50%; left: 50%;\">$assignname is already assigned the task</div>";
          }
          else{
            try {
              if($projectid!=""){
                $SQLInsert = "INSERT into assign(projectid, post ,username) VALUES ('$projectid','$assignrole','$assignname')";
  
              $statement = $conn->prepare($SQLInsert);
              $statement->execute();
              echo $statement->rowCount() . "<div style = \" text-align: center; position: absolute; top: 50%; left: 50%;\"> records UPDATED successfully</div>";
              }
            }
            catch(PDOException $e)
              {
              echo $SQLInsert . "<br>" . $e->getMessage();
              }
          }

        }
        ?>
