<?php  
	$id = $_POST['id'];

	include "dbconnect.php";

	$sql = "SELECT * FROM student WHERE `stu_id` LIKE '$id'";

	$result = mysqli_query($db,$sql);

	if(mysqli_num_rows($result)>0){
		echo "<script>alert('Student id found!');</script>";
		print '<script>window.location.assign("page-admin-student-details.php?id='.$id.'");</script>';
	}else{
		echo "<script>alert('Student id doesnt exist exist!');</script>";
		print '<script>window.location.assign("page-admin-student.php");</script>';
	}
?>