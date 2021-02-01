<?php  
 $id = $_GET['id'];

 include "dbconnect.php";

	$sql = "DELETE FROM `student` WHERE `stu_id`='$id'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Student deleted!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-student.php");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during deleting student");</script>';
			print '<script>window.location.assign("page-admin-student.php");</script>';
			}
?>