<?php  
	
	$id = $_GET['id'];
	$code = $_POST['subcode'];
	$day = $_POST['subtimetableday'];
	$time=$_POST['subtimetableday1'];
	

	include "dbconnect.php";

	$sql = "UPDATE `teach` SET `timetable_day`= '$day',`timetable_session`= '$time' WHERE `tcr_id`='$id' AND `subject_code`='$code'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Successfully update timetable teacher!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-teacher-updatetimetable.php?id='.$id.'");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during updating timetable");</script>';
			print '<script>window.location.assign("page-admin-teacher-updatetimetable.php?id='.$id.'");</script>';
			}

	
?>