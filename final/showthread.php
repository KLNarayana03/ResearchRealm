<!--
//index.php
!-->
<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';


$userid = $_SESSION['id'];
//Query for displaying in invites
$query = "select * from users where id != $userid";
$result_assign = $conn->prepare($query);
$result_assign->execute();

$sno = 1;
//Query for displaying members


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
  
 <title>Invite Page</title> 
<link rel="stylesheet" href="landingpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="font-awesome.css">
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
      <a href="calendarindex.php">Calendar Entries</a>
    </div>

  </div>

<div class="main" id="main">
<?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <!-- <?php echo "<h1> Welcome ".$_SESSION['username']." To Dashboard </h1>" ?> -->
  <div class="maincontent">
  <html>  
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Chat Application using PHP Ajax Jquery</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">ChatBot</h3><br />
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h4>Online User</h4>
				</div>
				<div class="col-md-2 col-sm-3">
					<input type="hidden" id="is_active_thread_group_chat_window" value="no" />
					<button type="button" name="thread_group_chat" id="thread_group_chat" class="btn btn-warning btn-xs">Group Chat</button>
				</div>
				<div class="col-md-2 col-sm-3">
					<p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="landingpage.php">Home</a></p>
				</div>
			</div>
			<div class="table-responsive">
				
				<div id="user_details"></div>
				<div id="user_model_details"></div>
			</div>
			<br />
			<br />
			
		</div>
		
    </body>  
</html>

<style>

.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#thread_group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  

<div id="thread_group_chat_dialog" title="Group Chat Window">
	<div id="thread_group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

	</div>
	<div class="form-group">
		<!--<textarea name="thread_group_chat_message" id="thread_group_chat_message" class="form-control"></textarea>!-->
		<div class="chat_message_area">
			<div id="thread_group_chat_message" contenteditable class="form-control">

			</div>
			<div class="image_upload">
				<form id="uploadImage" method="post" action="upload.php">
					<label for="uploadFile"><img src="upload.png" /></label>
					<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
				</form>
			</div>
		</div>
	</div>
	<div class="form-group" align="right">
		<button type="button" name="send_thread_group_chat" id="send_thread_group_chat" class="btn btn-info">Send</button>
	</div>
</div>


<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		fetch_thread_group_chat_history();
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	function update_last_activity()
	{
		$.ajax({
			url:"update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
		$('#user_model_details').html(modal_content);
	}

	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:400
		});
		$('#user_dialog_'+to_user_id).dialog('open');
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
	});

	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+to_user_id).val('');
					var element = $('#chat_message_'+to_user_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}

	$(document).on('click', '.ui-button-icon', function(){
		$('.user_dialog').dialog('destroy').remove();
		$('#is_active_thread_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{
				
			}
		})
	});

	$('#thread_group_chat_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#thread_group_chat').click(function(){
		$('#thread_group_chat_dialog').dialog('open');
		$('#is_active_thread_group_chat_window').val('yes');
		fetch_thread_group_chat_history();
	});

	$('#send_thread_group_chat').click(function(){
		var chat_message = $.trim($('#thread_group_chat_message').html());
		var action = 'insert_data';
		if(chat_message != '')
		{
			$.ajax({
				url:"thread_group_chat.php",
				method:"POST",
				data:{chat_message:chat_message, action:action},
				success:function(data){
					$('#thread_group_chat_message').html('');
					$('#thread_group_chat_history').html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_thread_group_chat_history()
	{
		var thread_group_chat_dialog_active = $('#is_active_thread_group_chat_window').val();
		var action = "fetch_data";
		if(thread_group_chat_dialog_active == 'yes')
		{
			$.ajax({
				url:"thread_group_chat.php",
				method:"POST",
				data:{action:action},
				success:function(data)
				{
					$('#thread_group_chat_history').html(data);
				}
			})
		}
	}

	$('#uploadFile').on('change', function(){
		$('#uploadImage').ajaxSubmit({
			target: "#thread_group_chat_message",
			resetForm: true
		});
	});

	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
	
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

</body>
</html>

<!-- <?php

include('database_connection.php');

session_start();


?> -->

