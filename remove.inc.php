<?php   

if (isset($_POST['remove'])) {
	include_once 'dbh.inc.php'; 
	$foodno=$_POST['remove'];

	$sql3="select max(orderno) as orderno from orders ";
	$result3=mysqli_query($conn,$sql3);
	$row = mysqli_fetch_assoc($result3);
	$orderno=$row['orderno'];

	$sql4="delete from contains where orderno='$orderno' and foodno='$foodno'";
	mysqli_query($conn,$sql4);

	header("Location: ../order.php?$foodno=removed");
	exit();


}	

if (isset($_POST['minus'])) {
	include_once 'dbh.inc.php'; 
	$foodno=$_POST['minus'];

	$sql3="select max(orderno) as orderno from orders ";
	$result3=mysqli_query($conn,$sql3);
	$row = mysqli_fetch_assoc($result3);
	$orderno=$row['orderno'];

	$sql4="update contains set quantity=quantity-1 where orderno='$orderno' and foodno='$foodno'";
	mysqli_query($conn,$sql4);

	header("Location: ../order.php?$foodno=removed");
	exit();


}	

if (isset($_POST['plus'])) {
	include_once 'dbh.inc.php'; 
	$foodno=$_POST['plus'];

	$sql3="select max(orderno) as orderno from orders ";
	$result3=mysqli_query($conn,$sql3);
	$row = mysqli_fetch_assoc($result3);
	$orderno=$row['orderno'];

	$sql4="update contains set quantity=quantity+1 where orderno='$orderno' and foodno='$foodno'";
	mysqli_query($conn,$sql4);

	header("Location: ../order.php?$foodno=removed");
	exit();


}	