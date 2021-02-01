<?php
	$id = $_GET['id'];
	$subject = $_POST['subject'];
	$day = null;
	$session = null;

	include "dbconnect.php";

	$sql = "INSERT INTO `learn`(`stu_id`, `subject_code`, `timetable_day`, `timetable_session`) VALUES ('$id', '$subject', '$day', '$session') ";

	$result = mysqli_query($db,$sql);

	if ($result) {
		print '<script>alert("Success registered");</script>';
		print '<script>window.location.assign("page-student-subject-reg.php?id='.$id.'");</script>';
	}
	else{
		print '<script>alert("Failed to register");</script>';
		print '<script>window.location.assign("page-student-subject-reg.php?id='.$id.'");</script>';
	}
?>