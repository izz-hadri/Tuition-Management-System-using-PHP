<?php  
	$id = 0;
	$pass = $_POST['stdpass'];
	$ic = $_POST['stdic'];
	$name = $_POST['stdname'];
	$sex = $_POST['stdgender'];
	$address = $_POST['stdaddress'];
	$category = $_POST['stdcategory'];
	$email = $_POST['stdemail'];
	$phone = $_POST['stdphone'];
	$parentPhone = $_POST['stdtel'];

	include "dbconnect.php";

	$sql = "INSERT INTO `student`(`stu_id`, `stu_password`, `stu_ic`, `stu_name`, `stu_sex`, `stu_address`, `stu_category`, `stu_email`, `stu_phone_num`, `stu_parent_phone_num`) VALUES ('$id', '$pass', '$ic', '$name', '$sex', '$address', '$category', '$email', '$phone', '$parentPhone')";

	$result = mysqli_query($db,$sql);

	if ($result) {
		mysqli_commit($db);
		$sql2="SELECT * FROM student ORDER BY stu_id DESC LIMIT 1";
		$result2=mysqli_query($db, $sql2);
		if($result2){
			$row = mysqli_fetch_assoc($result2);
			$to = $row['stu_email'];
			$subject = "Signup | Registration";
			$sname=$row['stu_name'];
			$sid=$row['stu_id'];
			$message = "
								 
				Thanks for signing up!
				Your account has been created, you can login with the following credentials.
								 
				------------------------
				Student Name : $sname
				Student ID   : $sid
				------------------------
								
			";
			$headers = "From: noreply@Pusat_Tuisyen_Anjung_Firasat.com";
			mail($to,$subject,$message,$headers);

			print '<script>alert("You are successfully registered as student! Please Check Your Email for the Student ID");</script>';
			print '<script>window.location.assign("login-student.html");</script>';
		}else{
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue when delivering email");</script>';
			print '<script>window.location.assign("signup-student.html");</script>';
		}
		print '<script>window.location.assign("login-student.html");</script>';}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during registration");</script>';
			print '<script>window.location.assign("signup-student.html");</script>';
			}

	
?>