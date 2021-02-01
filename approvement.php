<?php  
	$temp_id = $_POST['temp_id'];
	$name = $_POST['tcrname'];
	$pass = $_POST['tcrpass'];
	$ic = $_POST['tcric'];
	$sex = $_POST['tcrgender'];
	$status = $_POST['tcrstatus'];
	$email = $_POST['tcremail'];
	$address = $_POST['tcraddress'];
	$phone = $_POST['tcrphone'];

	include "dbconnect.php";
	//insert into teacher from temp_tcr
	$sql = "INSERT INTO `teacher`(`tcr_id`, `tcr_ic`, `tcr_password`, `tcr_name`, `tcr_sex`, `tcr_status`, `tcr_address`, `tcr_telnum`, `tcr_email`) VALUES ('$temp_id', '$ic', '$pass', '$name', '$sex', '$status', '$address', '$phone', '$email')";
	//delete temp tcr
	$sql2 = "DELETE FROM `temp_teacher` WHERE `tmp_tcr_id`='$temp_id'";

	$timeSession = null;
	$day = null;
	
	$izz="SELECT * FROM `temp_teach` WHERE `tmp_tcr_id`='$temp_id'";
	
	$result = mysqli_query($db,$sql);

	$resultt = mysqli_query($db,$izz);

	while($rrow=mysqli_fetch_array($resultt)){
		$subCode = $rrow['subject_code'];
		$sql4 = "INSERT INTO `teach` (`tcr_id`, `subject_code`, `timetable_day`, `timetable_session`) VALUES ('$temp_id','$subCode','$day','$timeSession')";
		$result6 = mysqli_query($db,$sql4);
		
	}
	$sql5 = "DELETE FROM `temp_teach` WHERE `tmp_tcr_id`='$temp_id'";
	//$result5 = mysqli_query($db,$sql5);
	$result2 = mysqli_query($db,$sql2);

	if ($result && $result2) {
		mysqli_commit($db);

		$sql3="SELECT * FROM teacher ORDER BY tcr_id DESC LIMIT 1";
		$result3=mysqli_query($db, $sql3);
		if($result3){
			$row = mysqli_fetch_assoc($result3);
			$to = $row['tcr_email'];
			$subject = "Registration Success";
			$tname=$row['tcr_name'];
			$tid=$row['tcr_id'];
			$message = "
								 
				Thanks for signing up!
				Your account has been created, you can login with the following credentials.
								 
				------------------------
				Teacher Name : $tname
				Teacher ID   : $tid
				------------------------
								
			";
			$headers = "From: noreply@Pusat_Tuisyen_Anjung_Firasat.com";
			mail($to,$subject,$message,$headers);

		print '<script>alert("Teacher had been registered!");</script>';
		print '<script>window.location.assign("page-admin-teacher-approvement-form.php");</script>';
		}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! Teacher is not being registered");</script>';
			print '<script>window.location.assign("page-admin-teacher-approvement-form.php");</script>';
			}
	}
?>