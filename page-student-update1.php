<?php  
	$id = $_GET['id'];
	$ic = $_POST['stdic'];
	$name = $_POST['stdname'];
	$sex = $_POST['stdgender'];
	$address = $_POST['stdaddress'];
	$category = $_POST['stdcategory'];
	$email = $_POST['stdemail'];
	$phone = $_POST['stdphone'];
	$parentPhone = $_POST['stdtel'];

	include "dbconnect.php";

	$sql = "UPDATE `student` SET `stu_ic`= '$ic',`stu_name`='$name',`stu_sex`='$sex',`stu_address`='$address',`stu_category`='$category',`stu_email`='$email',`stu_phone_num`='$phone',`stu_parent_phone_num`='$parentPhone' WHERE `stu_id`='$id'";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Your record has been updated!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-student-details.php?id='.$id.'");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during updating process");</script>';
			print '<script>window.location.assign("page-student-details.php?id='.$id.'");</script>';
			}

	
?>