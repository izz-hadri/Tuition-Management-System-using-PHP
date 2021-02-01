<?php  
	$id = $_POST['id'];
	$password = $_POST['pass'];

	include "dbconnect.php";

	$sql = "SELECT * FROM admin WHERE admin_id ='$id' AND admin_password ='$password'";

	$result = mysqli_query($db,$sql) or die(mysqli_error());

	$row = mysqli_num_rows($result);

	if($row==1){
		header("Location: page-admin-teacher-approvement-form.php");
	}else{
		echo '<script>alert("Wrong admin id and password")</script>';
		print "<script type='text/javascript'>window.location.assign('login-admin.html')</script>";
	}
?>