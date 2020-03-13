<?php
	session_start();
	include_once("config.php");

	opendb();

	if(isset($_POST['booking']))
	{
		$bdate = date('Y-m-d', strtotime($_REQUEST['bdate']));
		$ddate = date('Y-m-d', strtotime($_REQUEST['ddate']));
		$userid = intval($_SESSION['mps']['u_id']);

    	$query = "INSERT INTO booking(quantity, booking_dt, delivery_dt, user, pattern, status) VALUES ('" . intval($_POST['quantity']) . "','{$bdate}','{$ddate}','{$_SESSION['mps']['u_id']}', '" . intval($_REQUEST['pattern']) . "', 'New Booking')";

		mysql_query($query) or db_fail($query);
		$id = mysql_insert_id();

		header("Location: measure.php?id={$id}");
	}
	else
		header("Location: booking.php");

	closedb();
?>
