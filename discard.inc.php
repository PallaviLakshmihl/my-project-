<?php    /*to check whether the submit is clicked or not in sign up page*/

if (isset($_POST['discard'])) {
	include_once 'dbh.inc.php';
	$orderno=$_POST['discard'];
	/*$sql3="select * from orders where orderdate='0000-00-00'";
	$result3=mysqli_query($conn,$sql3);
	$row = mysqli_fetch_assoc($result3);
	$orderno=$row['orderno'];*/
	
	$sql4="delete from orders where orderno='$orderno'";
	mysqli_query($conn,$sql4);
	/*session_start();//start session 
	session_unset();// unset all the session variables inside session
	session_destroy();*/
	header("Location: ../index.php");
	exit();

}