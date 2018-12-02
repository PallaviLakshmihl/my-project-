<?php
	include_once 'dbh.inc.php';

	if(isset($_POST['update']))
	{
		$orderno=$_POST['update'];
		$status=$_POST['status'];
		
		$sql="update orders set status='$status' where orderno='$orderno'";
		mysqli_query($conn,$sql);
		echo"<script type='text/javascript'> alert ('Status updated'); window.location.href='../delivery.php';</script>";
	}

	else{
	header("Location: ../deliveryviews.php?error");
	exit();
}