<?php  
 $id = $_GET['id'];

 include "dbconnect.php";

	$sql = "DELETE FROM `teacher` WHERE `tcr_id`='$id'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Teacher deleted!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-teacher.php");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during deleting teacher");</script>';
			print '<script>window.location.assign("page-admin-teacher.php");</script>';
			}
?>