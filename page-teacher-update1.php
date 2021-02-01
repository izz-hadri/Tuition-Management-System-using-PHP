<?php  
	$id = $_GET['id'];
	$name = $_POST['tcrname'];
	$ic = $_POST['tcric'];
	$sex = $_POST['tcrgender'];
	$status = $_POST['tcrstatus'];
	$email = $_POST['tcremail'];
	$address = $_POST['tcraddress'];
	$phone = $_POST['tcrphone'];

	include "dbconnect.php";

	$sql = "UPDATE `teacher` SET `tcr_ic`='$ic',`tcr_name`='$name',`tcr_sex`='$sex',`tcr_status`='$status',`tcr_address`='$address',`tcr_telnum`='$phone',`tcr_email`='$email' WHERE `tcr_id`='$id'";

	$result = mysqli_query($db,$sql);
	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Your details sucessfully updated!");</script>';
		print '<script>window.location.assign("page-teacher-details.php?id='.$id.'");</script>';
		}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during updating details");</script>';
			print '<script>window.location.assign("page-teacher-details.php?id='.$id.'");</script>';
			}

	
?>