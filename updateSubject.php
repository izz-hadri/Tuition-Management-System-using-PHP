<?php  
	
	$code = $_POST['subcode'];
	$module=$_POST['submodule'];
	$name=$_POST['subname'];
	$price=$_POST['subprice'];

	include "dbconnect.php";

	$sql = "UPDATE `subject` SET `subject_code`='$code',`subject_module`='$module',`subject_name`='$name',`subject_price`='$price' WHERE `subject_code`='$code'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Successfully updating subject!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-viewsubject.php");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during updating subject");</script>';
			print '<script>window.location.assign("page-admin-updatesubject.php?id='.$code.'");</script>';
			}

	
?>