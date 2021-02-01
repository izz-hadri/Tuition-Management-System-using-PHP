<?php  

	$id = $_GET['id'];

	include "dbconnect.php";

	$sql = "DELETE FROM `temp_teacher` WHERE `tmp_tcr_id`='$id'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		//print '<script>alert("Your application has successfully send!\n You will be email as soon as possible");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-teacher-approvement-form.php");</script>';
		print '<script>alert("Application had been disapprove!");</script>';
		}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during disapprove");</script>';
			print '<script>window.location.assign("page-admin-teacher-approvement-form.php");</script>';
			}

	
?>
