<?php

include_once 'source/db_connect.php';
include_once 'source/session.php';
$id = $_SESSION['id'];
  
$query = "select * from projects where userid = $id";
$result =$conn->prepare($query);
$result->execute();
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
  
 <title>Landing Page</title> 
<link rel="stylesheet" href="landingpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="font-awesome.css">
</head>
<body>

  <div class="header">

    <a href="#" style="margin-left: 5px;">App logo</a>
    
    <div id="logout">Logout<a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-left: 15px;"></i></a></div>
    
    <div id="usertype">Faculty<a href="#"><i class="far fa-address-card" style="margin-left: 15px;"></i></a></div>
 </div>

<div class="row">

  <div class="sidenav">
    
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
      <button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
  <form action="createproject.php" class="form-container" method="post">
    <h1>Project</h1>

    <label for="projectname"><b>Project Name</b></label>
    <input type="text" placeholder="Enter Project Name" name="projectname" required>

    <label for="projecttype">Project Type:</label>
    <select id="projecttype" name="projecttype">
    <option value="btp">B.Tech Project</option>
    <option value="mtp">M.Tech Project</option>
    <option value="phd">PhD Project</option>
    <option value="sponsored">Sponsored Project</option>
    <option value="internship">Internship Project</option>
    <option value="misc">Miscellaneous Project</option>
    </select>

    <label for="projectdesc"><b>Project Description</b></label>
    <input type="text" placeholder="Enter Project Description" name="projectdesc">

    <!-- <button type="submit" class="btn" name="projectup-btn">Submit</button> -->
    <input type="submit" name="projectup-btn" class="btn" value="Submit">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
        <!-- <a href="#">B.Tech Project</a>
        <a href="#">M.Tech Project</a>
        <a href="#">PhD Project</a>
        <a href="#">Sponsored Project</a>
        <a href="#">Intern Project</a> -->
      </div>

      <button class="dropdown-btn">Tasks 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Project Deliverables</a>
        <a href="#">Others</a>
      </div>

      <button class="dropdown-btn">Inventory 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Equipments</a>
        <a href="#">Consumables</a>
      </div>

     <button class="dropdown-btn">Resources
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Documents</a>
    <a href="#">Softwares</a>
    <a href="#">Files</a>
    <a href="#">Images</a>
    <a href="#">Videos</a>
  </div>

  <button class="dropdown-btn">Calendar Entries 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Meetings</a>
    <a href="#">Reminders</a>
    <a href="#">Deadlines</a>
  </div>

  </div>

  <button class="dropdown-btn"><i class='far fa-edit' style="margin-right: 20px;"></i>Assign 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <button class="dropdown-btn">Project 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">B.Tech Project</a>
        <a href="#">M.Tech Project</a>
        <a href="#">PhD Project</a>
        <a href="#">Sponsored Project</a>
        <a href="#">Intern Project</a>
      </div>

      <button class="dropdown-btn">Tasks 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Project Deliverables</a>
        <a href="#">Others</a>
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
    <button class="dropdown-btn">Resources
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">Documents</a>
        <a href="#">Softwares</a>
        <a href="#">Files</a>
        <a href="#">Images</a>
        <a href="#">Videos</a>
      </div>
  </div>


  <button class="dropdown-btn"><i class="far fa-trash-alt" style="margin-right: 20px;"></i>End 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <button class="dropdown-btn">Project 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="#">B.Tech Project</a>
        <a href="#">M.Tech Project</a>
        <a href="#">PhD Project</a>
        <a href="#">Sponsored Project</a>
        <a href="#">Intern Project</a>
      </div>

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

<div class="main">
  
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

</div>

<div class="footer">
    <p class="copyright">Copyright © App Name. All Rights Reserved.</p>
</div>
<?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <!-- <?php echo "<h1> Welcome ".$_SESSION['username']." To Dashboard </h1>" ?> -->
   
 <table align="center" border="2px" style="width:600px; line-height:40px;">
      <tr>
        <th colspan="3"><h2>Ongoing Projects</h2></th>  
      </tr>
      <t>
        <th>Project Name</th>
        <th>Project Type</th>
        <th>Project Date</th>
      </t>
      <?php
        while($rows=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr>
          <td><?php echo $rows['projectname']; ?></td>
          <td><?php echo $rows['projecttype']; ?></td>
          <td><?php echo $rows['projectdate']; ?></td>
        </tr>
          <?php
        }
          ?>
      
 </table>     

</body>
</html>