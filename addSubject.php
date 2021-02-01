<?php  
	
	$id = 0;
	$email = $_POST['password'];
	$password = $_POST['password'];
	$token = 0;
	$type = $_POST['type'];

	$encrypt = password_hash($password, PASSWORD_DEFAULT);

	include "dbconnect.php";

	$sql = "INSERT INTO user('id', 'email', 'encrypted_password', 'token','type') VALUES ('$id', '$email', '$encrypt', '$token', '$type')";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		print '<script>alert("Successfully adding new subject!");</script>';
		print '<script>window.location.assign("index.html");</script>';
	}else{		
		mysqli_rollback($db);
		print '<script>alert("Error! There some issue during adding new subject");</script>';
		print '<script>window.location.assign("admin-login.html");</script>';
	}
	
?>