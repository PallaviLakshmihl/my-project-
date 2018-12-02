<?php
	include_once 'dbh.inc.php';
	$sql3="select max(orderno) as orderno from orders ";
	$result3=mysqli_query($conn,$sql3);
	$row = mysqli_fetch_assoc($result3);
	$orderno=$row['orderno'];
	

    /*to check whether the submit is clicked or not in sign up page*/
	if (isset($_POST['add'])) {
		$foodno=$_POST['add'];

		$sql4="select * from contains where orderno='$orderno' and foodno='$foodno'";
		$result4=mysqli_query($conn,$sql4);
		$resultCheck = mysqli_num_rows($result4);
		
		if ($resultCheck==1) {
			$row4=mysqli_fetch_assoc($result4);
			$quantity=$row4['quantity'];
			$quantity=$quantity+1;
			$sql ="update contains set quantity='$quantity' where orderno='$orderno' and foodno='$foodno'";
		 	mysqli_query($conn, $sql);	
		}
		else {
			$sql = "insert into contains(orderno,foodno,quantity) values($orderno,$foodno,1)";
			 mysqli_query($conn, $sql);
			}
			header("Location: ../menu.php?$foodno=added");
			exit();

	}


else{
	header("Location: ../menu.php?error");
exit();
}


