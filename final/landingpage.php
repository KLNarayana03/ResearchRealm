<?php

include_once 'source/db_connect.php';
include_once 'source/session.php';
$id = $_SESSION['id'];
$username = $_SESSION['username'];

//query for displaying notification
$query = "SELECT * FROM inviterequest, projects, users WHERE inviterequest.projectid = projects.id AND projects.userid = users.id AND receivername = :username AND curstatus=0";
$result_display_notification = $conn->prepare($query);
$result_display_notification->bindParam(':username', $username);
$result_display_notification->execute();

//query for displaying invited projects
$query = "SELECT * FROM inviterequest, projects WHERE inviterequest.projectid = projects.id AND receivername = :username AND curstatus=1";
$result_display_invited_projects = $conn->prepare($query);
$result_display_invited_projects->bindParam(':username', $username);
$result_display_invited_projects->execute();

//query for displaying assigned tasks
$query = "select * from assigntask where username = '$username'";
$result_display_assigned_task =$conn->prepare($query);
$result_display_assigned_task->execute();
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
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
 <title>Landing Page</title> 
<link rel="stylesheet" href="landingpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="font-awesome.css">
</head>
<body>

  <div class="header">

    <a id="logo" href="landingpage.php" >Logo</a>
    
    <div id="header_icons">
    <div id="usertype"><?php echo $_SESSION['username'] ?><a href="#"><i class="far fa-address-card"></i></a></div>
    
    <div id="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></div>
    </div>
 </div>


 <!-- VIEW SECTION STARTS -->
 <section id="view">

 

<!-- SIDE NAV SECTION STARTS -->
  <div class="sidenav" id="sidenav">
    

  <button class="dropdown-btn"><i class='far fa-folder-open' style="margin-right: 20px;"></i>Create 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    
    <button class="dropdown-btn">Project 
        <i class="fa fa-caret-down"></i>
    </button>
      <div class="dropdown-container">
      <button   data-toggle="modal" data-target="#exampleModal" class="open-formbutton" onclick="openForm()">Create new Project</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

<div class="form-popup modal-content" id="myForm">
  <form action="createproject.php" class="form-container" method="post">

    <div class="modal-header" style="text-align: center">
    <button class="open-button">Create new Project</button>  
    <hr class="new1">
    </div>
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
   <div  class="modal-footer" >
   <button type="button" class="btn cancel" data-dismiss="modal" onclick="closeForm()">Close</button>
   </div>

  </form>
</div>
</div>
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
       
      </div>

      <button class="dropdown-btn">Tasks 
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <button type="button" class="open-formbutton" data-toggle="modal" data-target="#exampleModal2" onclick="openForm2()">Create new Task</button>


<!-- Modal2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

        <div class="form-popup modal-content" id="myForm2">
  <form action="createtasks.php" class="form-container" method="post">
  <div class="modal-header" style="text-align: center">
    <button class="open-button">Create new Task</button>  
    <hr class="new1">
    </div>
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
</div>
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
   <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <button class="open-formbutton" style="margin-left: 0 ; padding: 5px"><a href="calendarindex.php">New Calendar Entry</a></button>
        <div class="form-popup" id="myForm3">
  <form action="createcalendarentries.php" class="form-container" method="post">
    
  <button class="open-button">Create new Calendar Entry</button>  
    <hr class="new1">
   
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

  <button class="dropdown-btn">Inventories 
   <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <button class="open-formbutton" data-toggle="modal" data-target="#exampleModal3" onclick="openForm4()">New Inventory</button>
        
 
  <!-- Modal3 -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="form-popup modal-content" id="myForm4">
  <form action="createinventory.php" method="POST" class="form-container">  
  <div class="modal-header" style = "text-align: center;">
  <button class="open-button">Create new Inventory</button>  
    <hr class="new1">
</div>
    <label style="font-size:17.5px; font-weight:100;">Inventory Type: &nbsp </label>
    <select style="width: 20.9%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1;" for="inventorytype" id="inventorytype" name="inventorytype" style="margin-bottom:20px;">
      <option value="Equipment">Equipment</option>
      <option value="Consumables">Consumables</option>
    </select><br> 
  
    <label style="font-size:17.5px; font-weight:100;">Inventory Name: &nbsp  </label>
    <input style="width: 28%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1;" for="inventoryname" type="text" placeholder="Enter Inventory Name" name="inventoryname" required>
    <br>
  
    <label style="font-size:17.5px; font-weight:100;">Inventory Id: &nbsp  </label>
    <input style="width: 28%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1;" for="inventoryid" type="text" placeholder="Enter Unique Inventory Id" name="inventoryid" required>
    <br>
  
    <label style="font-size:17.5px; font-weight:100;">Manufacturer Name: &nbsp  </label>
    <input style="width: 28%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1;" for="manufacturername" type="text" placeholder="Enter Manufacturer Name" name="manufacturername" required>
    <br>
    
    <textarea for="inventorydesc" name="inventorydesc" id="inventorydesc" class="projectdescription" placeholder="Enter Inventory Description (Optional)" style="height:50px"></textarea>
    </textarea><br>

    <input type="submit" name="projectup-btn" class="btn" value="Submit">
    <button type="button" class="btn cancel" onclick="closeForm4()">Close</button>
     </form> 
  </div>
</div>
</div>
<script>
function openForm4() {
  document.getElementById("myForm4").style.display = "block";
  document.getElementById("main").style.display = "none";
}

function closeForm4() {
  document.getElementById("myForm4").style.display = "none";
  document.getElementById("main").style.display = "block";
}
</script>
  </div>

  </div>

  <button class="dropdown-btn"><i class='far fa-edit' style="margin-right: 20px;"></i>Assign 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <button class="dropdown-btn"><a href="assignproject.php">Role
     <i class="fa fa-caret-down"></i>
     </a></button>
      
     

     <button class="dropdown-btn"> <a href="assigntasktable.php">Task
     <i class="fa fa-caret-down"></i>
      </a>
      </button>

      <button class="dropdown-btn"><a href="assigninventorytable.php" >Inventory 
     <i class="fa fa-caret-down"></i>
      </a>
      </button>
  </div>

  
  <button class="dropdown-btn"><i class="far fa-calendar" style="margin-right: 20px;"></i>Fix
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <button class="dropdown-btn"><a href="fixmeetingtable.php" >Meeting
     <i class="fa fa-caret-down"></i>
      </a></button>
  </div>

  
  <button class="dropdown-btn"><i class="fas fa-share-alt" style="margin-right: 20px;"></i>Share 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <button class="open-formbutton" data-toggle="modal" data-target="#exampleModal4" onclick="openshareform()">Resources</button>

    <!-- Modal4 -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
 <div class="form-popup modal-content" id="shareform">
  <form action="shareresources.php" class="form-container" method="post" enctype="multipart/form-data">
  <div class="modal-header" style="text-align: center">
    <button class="open-button">Share Resources</button>  
    <hr class="new1">
</div>
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
    </div>
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
     <i class="fa fa-caret-down"></i>
      </a>

      <a href="assignproject.php" style="color:white;">Assigned Tasks 
     <i class="fa fa-caret-down"></i>
      </a>
  </div>

  
  <button class="dropdown-btn"><i class='far fa-comment-alt' style="margin-right: 20px;"></i>Interact
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="chatindex.php" style="color:white;">Chat Box</a>
    <!-- <a href="discussion.php" style="color:white;">Discussion Thread</a> -->
  </div>

  
  <button class="dropdown-btn"><i class='far fa-calendar-alt' style="margin-right: 20px;"></i>Remind 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="calendarindex.php">Calendar Entries</a>
  </div>



  </div>
<!-- SIDE NAV ENDS -->


<!-- MAIN SECTION STARTS -->
<div id="main_part">

<div class="main">
<?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <!-- <?php echo "<h1> Welcome ".$_SESSION['username']." To Dashboard </h1>" ?> -->

<div class="maincolumn1" id="maincolumn1">
<div style="text-align: center;">
<button class="topbutton">My Dashboard</button>
<hr class="new1">
</div>

<!-- My Projects -->
<div class="card-container">
  <div class="card-header">
  <a href ="allprojects.php"><i class='far fa-folder-open' style="font-size:22px; margin-right: 10px;"></i>Projects</a>
  
  </div>
  <div class="card-body">
    <h3 class="card-title" style="color: black; ">Projects</h3>
    <p class="card-text">Here you can view all the projects in which you are present.</p>
  </div>
</div>


<!-- My Tasks -->   
<div class="card-container">
  <div class="card-header">
  <a href ="alltasks.php"><i class='far fa-edit' style="font-size:21.5px;  margin-right: 10px;"></i>Tasks</a>
  </div>
  <div class="card-body" style="font-size:14.5px; color:black;">
    <h3 class="card-title">Tasks</h3>
    <p class="card-text">Here you can view all your tasks created or assigned to you.</p>
  </div>
</div>  
<br>

  
<!-- Calendar Entries-->   
<div class="card-container">
  <div class="card-header">
  <a href ="calendarindex.php" ><i class="far fa-calendar" style="font-size:21px; margin-right: 11px;"></i>Calendar Entries</a>
  </div>
  <div class="card-body" style="font-size:14.5px; color:rgb(59, 49, 54);">
    <h3 class="card-title">Calendar Entries</h3>
    <p class="card-text">Here you can view all the calendar entries created by you.</p>
  </div>
</div>

<!-- Recycle-Bin -->   
<div class="card-container">
  <div class="card-header">
  <a href = "deletedprojects.php" ><i class="fa fa-trash-o" style="font-size:24px; margin-right: 10px;"></i>Completed Projects</a>
  
  </div>
  <div class="card-body" style="font-size:14.5px;">
    <h3 class="card-title">Completed Projects and Tasks</h3>
    <p class="card-text">Here you can view and restore all your completed work.</p>
  </div>
</div><br>

<!-- Resources-->   
<div class="card-container">
  <div class="card-header">
  <a href ="allresources.php"><i class="fas fa-share-alt" style="font-size:20.5px; margin-right:10px;"></i>Resources</a>
  </div>
  <div class="card-body" style="font-size:14.5px; color:rgb(59, 49, 54);">
    <h3 class="card-title">Resources</h3>
    <p class="card-text">Here you can view all the calendar entries created by you.</p>
  </div>
</div>
<!-- maincolumn1 closes on next line-->
</div> 


<div class="maincolumn2" id="maincolumn2">
<div style="text-align: center;">
<button class="topbutton"><i class="fa fa-bell" style="font-size:20px; margin-right:10px;"></i>Notifications</button>
<hr class="new1">
    </div>


<!--Pending Requests-->   
<div class="card-container">
  <div class="card-header">
  <a href ="pendingrequests.php"><i class="fas fa-user-friends" style="font-size:20.5px; margin-right:10px;"></i>Pending Requests</a>
  </div>
  <div class="card-body" style="font-size:14.5px;">
    <h3 class="card-title">Pending Requests</h3>
    <p class="card-text">Here you can view all the pending requests for joining a project.</p>
  </div>
</div><br>

<?php
//Query for fetching approaching dates
  require_once('bdd.php');
  $sno1=1;
  $userid = $_SESSION['id'];
    $sql = "select * from events where DATE(start) - DATE(NOW()) > 0 and DATE(start) - DATE(NOW()) < 3 and userid = $userid";
    $req = $bdd->prepare($sql);
    $req->execute();
?>

<!-- Query for displaying approaching dates -->
    <table style="width:95%; border: 1px solid #ddd;">
    <tr style="background-color:lightblue;">
      <th colspan="3" style="text-align:center;"><h3>Upcoming Meetings </h3></th>  
    </tr>
    <tr>
      <th style="padding:5px; border: 1px solid #ddd; text-align:center;">S.No</th>
      <th style="padding:5px; border: 1px solid #ddd; text-align:center;">Title</th>
      <th style="padding:5px; border: 1px solid #ddd; text-align:center;">Date</th>
    </tr>
    <?php
      while($rows=$req->fetch(PDO::FETCH_ASSOC)){
          echo "
          <tr>
          <td style=\"padding:5px; text-align:center; border: 1px solid #ddd;\">".$sno1."</td>
          <td style=\"padding:5px; text-align:center; border: 1px solid #ddd;\">".$rows['title']."</td>
          <td style=\"padding:5px; text-align:center; border: 1px solid #ddd;\">".$rows['start']."</td>
          </tr>
          ";
          $sno1++;
      }
      ?>
    
    <!-- php code for displaying project members-->  
    
    </table>

<!-- maincolumn2 closes on next line-->  
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
      
      document.getElementById("main_part").style.opacity="1";
      } else {
      //  Dropdown styles
      dropdownContent.style.display = "block";

      // document elements styles
      document.getElementById("main_part").style.backgroundColor = "black";
      document.body.style.backgroundColor = "black";
      document.getElementById("main_part").style.opacity="0.5";
      
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

<!-- MAIN SECTION ENDS -->

  </div>
  </section>
 

</body>
</html>