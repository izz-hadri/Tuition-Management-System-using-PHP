<?php  
	$id = $_POST['id'];
	$password = $_POST['pass'];

	include "dbconnect.php";

	$sql = "SELECT * FROM student WHERE stu_id ='$id' AND stu_password ='$password'";

	$result = mysqli_query($db,$sql) or die(mysqli_error());

	$row = mysqli_num_rows($result);

	if($row==1){
		header("Location: page-student-details.php?id=$id");
	}else{
		print "<script type='text/javascript'>alert('Wrong student id and password')</script>";
		print "<script type='text/javascript'>window.location.assign('login-student.html')</script>";
	}
?>