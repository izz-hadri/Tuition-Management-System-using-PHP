<?php  
	$id = 0;
	$name = $_POST['stname'];
	$pass = $_POST['stpass'];
	$ic = $_POST['stic'];
	$category = $_POST['stcategory'];
	$email = $_POST['stemail'];
	$address = $_POST['staddress'];
	$phone = $_POST['stphone'];

	include "dbconnect.php";

	$sql = "INSERT INTO `temp_teacher`(`tmp_tcr_id`, `tmp_tcr_ic`, `tmp_tcr_password`, `tmp_tcr_name`, `tmp_tcr_sex`, `tmp_tcr_status`, `tmp_tcr_address`, `tmp_tcr_telnum`, `tmp_tcr_email`) VALUES ('$id', '$ic', '$pass', '$name', '$sex', '$status', '$address', '$phone', '$email')";

	$result = mysqli_query($db,$sql);

	$sql2 = "SELECT * FROM `temp_teacher` ORDER BY `tmp_tcr_id` DESC LIMIT 1";

	$result2 = mysqli_query($db,$sql2);

	$row = mysqli_fetch_assoc($result2)	;
	

	if ($result && $result2) {
		mysqli_commit($db);
		print '<script>
					if('.$category.' == "Teacher")
						window.location.assign("signup-teacher.php?id='.$row[tmp_tcr_id].'");
					else
						window.location.assign("signup-admin.php?id='.$row[tmp_tcr_id].'");
			   </script>';
		}
		else{
		
			mysqli_rollback($db);
			print '<script>alert("Error! There some issue during registration");</script>';
			print '<script>window.location.assign("signup-teacher.html");</script>';
			}

	
?>