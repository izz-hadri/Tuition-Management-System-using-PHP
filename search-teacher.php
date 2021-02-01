<?php  
	$id = $_POST['id'];

	include "dbconnect.php";

	$sql = "SELECT * FROM teacher WHERE `tcr_id` LIKE '$id'";

	$result = mysqli_query($db,$sql);

	if(mysqli_num_rows($result)>0){
		echo "<script>alert('Teacher id found!');</script>";
		print '<script>window.location.assign("page-admin-teacher-details.php?id='.$id.'");</script>';
	}
	else{
		echo "<script>alert('Teacher id doesnt exist exist!');</script>";
		print '<script>window.location.assign("page-admin-teacher.php");</script>';
	}
?>