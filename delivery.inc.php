<?php

/*start the session to use session variable*/
session_start();
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';
	$deliverypname = mysqli_real_escape_string($conn, $_POST['deliverypname']) ;
	$deliverypid= mysqli_real_escape_string($conn, $_POST['deliverypid']) ;

	//error handlers
	//check if the input are empty
	if (empty($deliverypname) || empty($deliverypid)) {
		header("Location: ../delivery.php?login=empty");
		exit();
		
	}else {
		$sql = "SELECT * FROM delivery WHERE deliverypname='$deliverypname'";
		$result = mysqli_query($conn, $sql);

		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck<1) {

			header("Location: ../delivery.php?login=error1");
			exit();
			
		}
		else{
			if ($row = mysqli_fetch_assoc($result)) {
				
				if ($row['deliverypid']!=$deliverypid) {
					//if password don't match
					header("Location: ../delivery.php?login=error2");
					exit();

				}
				elseif ($row['deliverypid']==$deliverypid)
				{
					
					$_SESSION['d_pid']= $row['deliverypid'];
					$_SESSION['d_pname']= $row['deliverypname'];
					header("Location: ../delivery.php?login=success");
					exit();
				}
			}
		}

	}
}
else{
	header("Location: ../delivery.php?login=error3");
	exit();

}


