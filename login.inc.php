<?php

/*start the session to use session variable*/
session_start();
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']) ;
	$pwd= mysqli_real_escape_string($conn, $_POST['pwd']) ;

	//error handlers
	//check if the input are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
		
	}else {
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email  ='$uid'";
		$result = mysqli_query($conn, $sql);

		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck<1) {

			header("Location: ../index.php?login=error1");
			exit();
			
		}
		else{
			if ($row = mysqli_fetch_assoc($result)) {
				//de-hashing the password
				/*to compare the password  entered in login page  with hashed password stored in database (dehash the hashed password and then compare it)*/ 
				
				//$hashedPwdCheck=password_verify($pwd, $row['user_pwd']);
				if ($row['user_pwd']!=$pwd) {
					//if password don't match
					header("Location: ../index.php?login=error2");
					exit();

					# code...
				}
				elseif ($row['user_pwd']==$pwd)
				{
					//log in the user here
					//to super global inside the php simple a variable that we can access in inside the website as along as session going inside the web page
					$_SESSION['u_id']= $row['user_id'];
					$_SESSION['u_first']= $row['user_first'];
					$_SESSION['u_last']= $row['user_last'];
					$_SESSION['u_email']= $row['user_email'];
					$_SESSION['u_uid']= $row['user_uid'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}

	}
}
else{
	header("Location: ../index.php?login=error3");
	exit();

}


