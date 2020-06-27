<?php
require_once('bdd.php');
include_once 'source/db_connect.php';
include_once 'source/session.php';

$userid = $_SESSION['id'];
$sql = "SELECT id, title, start, end, color FROM events where userid = $userid";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>
</head>
<body>

<div class="header">

<a href="landingpage.php" style="margin-left: 5px;">App logo</a>

<div id="logout">Logout<a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-left: 15px;"></i></a></div>

<div id="usertype"><?php echo $_SESSION['username'] ?><a href="#"><i class="far fa-address-card" style="margin-left: 15px;"></i></a></div>
</div>

<div class="row">

<div class="sidenav" id="sidenav">    


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
<button class="open-formbutton"><a href="calendarindex.php">New Calendar Entry</a></button>
    <div class="form-popup" id="myForm3">
<form action="createcalendarentries.php" class="form-container" method="post">

<button class="open-button">Create new Calendar Entry</button>  
<hr class="new1">
<!-- <input for="calendarentryname" type="text" placeholder="Title" name="calendarentryname" required>
<select for="calendarentrytype" id="projecttype" name="calendarentrytype" style="margin-bottom:20px;">
<option value="meetings">Meetings</option>
<option value="deadlines">Deadlines</option>
<option value="reminders">Reminders</option>
</select>
<label style="font-size:15.5px;">Date: &nbsp &nbsp </label>
<input for="calendarentrylastdate" type="date" name="calendarentrylastdate" required>
<textarea for="calendarentrydesc" class="projectdescription" name="calendarentrydesc" placeholder="Description" style="height:200px"></textarea> 
<input type="submit" name="projectup-btn" class="btn" value="Submit">
<button type="button" class="btn cancel" onclick="closeForm3()">Close</button> -->
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
<!-- <i class="fa fa-caret-down"></i>-->
</button>
<div class="dropdown-container">
<button class="open-formbutton" onclick="openForm4()">New Inventory</button>
    <div class="form-popup" id="myForm4">
<!-- <form action="createcalendarentries.php" class="form-container" method="post">
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
</form> -->
<form action="createinventory.php" method="POST" class="form-container">  
<button class="open-button">Create new Inventory</button>  
<hr class="new1">
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
<a href="assignproject.php" style="color:white;">Project 
 <!-- <i class="fa fa-caret-down"></i> -->
  </a>


  <a href="assigntasktable.php" style="color:white;">Task
 <!-- <i class="fa fa-caret-down"></i> -->
  </a>

  <a href="assignproject.php" style="color:white;">Inventory 
 <!-- <i class="fa fa-caret-down"></i> -->
  </a>

</div>


<button class="dropdown-btn"><i class="far fa-calendar" style="margin-right: 20px;"></i>Fix
<i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-container">
<a href="assignproject.php" style="color:white;">Meeting
 <!-- <i class="fa fa-caret-down"></i> -->
  </a>
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

  <a href="assignproject.php" style="color:white;">Assigned Tasks 
 <!-- <i class="fa fa-caret-down"></i> -->
  </a>

</div>


<button class="dropdown-btn"><i class='far fa-comment-alt' style="margin-right: 20px;"></i>Interact
<i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-container">
<a href="chatindex.php" style="color:white;">Chat Box</a>
<a href="#">Discussion Thread</a>
</div>


<button class="dropdown-btn"><i class='far fa-calendar-alt' style="margin-right: 20px;"></i>Remind 
<i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-container">
<a href="#">Calendar Entries</a>
</div>


</div>

<div class="main" id="main">
       
    <!-- Page Content -->
    <div class="container">

<div class="row">
	<div class="col-lg-12 text-center">
		<p class="lead">Double tap to enter the task</p>
		<div id="calendar" class="col-centered">
		</div>
	</div>
	
</div>
<!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	<form class="form-horizontal" method="POST" action="addEvent.php">
	
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Add Event</h4>
	  </div>
	  <div class="modal-body">
		
		  <div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
			  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
			</div>
		  </div>
		  <div class="form-group">
			<label for="color" class="col-sm-2 control-label">Color</label>
			<div class="col-sm-10">
			  <select name="color" class="form-control" id="color">
				  <option value="">Choose</option>
				  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
				  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
				  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
				  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
				  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
				  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
				  <option style="color:#000;" value="#000">&#9724; Black</option>
				  
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="start" class="col-sm-2 control-label">Start date</label>
			<div class="col-sm-10">
			  <input type="text" name="start" class="form-control" id="start" >
			</div>
		  </div>
		  <div class="form-group">
			<label for="end" class="col-sm-2 control-label">End date</label>
			<div class="col-sm-10">
			  <input type="text" name="end" class="form-control" id="end">
			</div>
		  </div>
		
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
	</form>
	</div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	<form class="form-horizontal" method="POST" action="editEventTitle.php">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
	  </div>
	  <div class="modal-body">
		
		  <div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
			  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
			</div>
		  </div>
		  <div class="form-group">
			<label for="color" class="col-sm-2 control-label">Color</label>
			<div class="col-sm-10">
			  <select name="color" class="form-control" id="color">
				  <option value="">Choose</option>
				  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
				  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
				  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
				  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
				  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
				  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
				  <option style="color:#000;" value="#000">&#9724; Black</option>
				  
				</select>
			</div>
		  </div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
				  </div>
				</div>
			</div>
		  
		  <input type="hidden" name="id" class="form-control" id="id">
		
		
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
	</form>
	</div>
  </div>
</div>

</div>
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>

<script>

$(document).ready(function() {

$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,basicWeek,basicDay'
	},
	// defaultDate: '2016-01-12',
	editable: true,
	eventLimit: true, // allow "more" link when too many events
	selectable: true,
	selectHelper: true,
	select: function(start, end) {
		
		$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
		$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
		$('#ModalAdd').modal('show');
	},
	eventRender: function(event, element) {
		element.bind('dblclick', function() {
			$('#ModalEdit #id').val(event.id);
			$('#ModalEdit #title').val(event.title);
			$('#ModalEdit #color').val(event.color);
			$('#ModalEdit').modal('show');
		});
	},
	eventDrop: function(event, delta, revertFunc) { // si changement de position

		edit(event);

	},
	eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

		edit(event);

	},
	events: [
	<?php foreach($events as $event): 
	
		$start = explode(" ", $event['start']);
		$end = explode(" ", $event['end']);
		if($start[1] == '00:00:00'){
			$start = $start[0];
		}else{
			$start = $event['start'];
		}
		if($end[1] == '00:00:00'){
			$end = $end[0];
		}else{
			$end = $event['end'];
		}
	?>
		{
			id: '<?php echo $event['id']; ?>',
			title: '<?php echo $event['title']; ?>',
			start: '<?php echo $start; ?>',
			end: '<?php echo $end; ?>',
			color: '<?php echo $event['color']; ?>',
		},
	<?php endforeach; ?>
	]
});

function edit(event){
	start = event.start.format('YYYY-MM-DD HH:mm:ss');
	if(event.end){
		end = event.end.format('YYYY-MM-DD HH:mm:ss');
	}else{
		end = start;
	}
	
	id =  event.id;
	
	Event = [];
	Event[0] = id;
	Event[1] = start;
	Event[2] = end;
	
	$.ajax({
	 url: 'editEventDate.php',
	 type: "POST",
	 data: {Event:Event},
	 success: function(rep) {
			if(rep == 'OK'){
				alert('Saved');
			}else{
				alert('Could not be saved. try again.'); 
			}
		}
	});
}

});

</script>

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
    <!-- Navigation -->
    

</body>

</html>

