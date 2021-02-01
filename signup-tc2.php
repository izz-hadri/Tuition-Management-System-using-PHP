<?php  
	$id = $_GET['id'];
	$sub_code = $_POST['tcr_sub_code'];

	include "dbconnect.php";

	$sql = "INSERT INTO `temp_teach`(`subject_code`, `tmp_tcr_id`) VALUES ('$sub_code', '$id')";

	$result = mysqli_query($db,$sql);

	if ($result ) {
		mysqli_commit($db);
		print '<script>alert("One Subject has been registered");</script>';
		print '<script>window.location.assign("signup-teacher2.php?id='.$id.'");</script>';
		}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during registration");</script>';
			print '<script>window.location.assign("signup-teacher2.php?id='.$id.'");</script>';
			}

	
?>