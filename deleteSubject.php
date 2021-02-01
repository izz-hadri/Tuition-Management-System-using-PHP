<?php  
	
	$id = $_GET['id'];

	include "dbconnect.php";

	$sql = "DELETE FROM `subject` WHERE `subject_code`='$id'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Successfully deleting subject!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-viewsubject.php");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during deleting subject");</script>';
			print '<script>window.location.assign("page-admin-viewsubject.php");</script>';
			}

	
?>