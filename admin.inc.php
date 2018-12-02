<?php

/*start the session to use session variable*/
session_start();
if (isset($_POST['submit'])) {
	$pwd=$_POST['pwd'];
	if($pwd=="hunger@123")
	{
		$_SESSION['admin']= "Admin";
		header("Location: ../admin.php?adminpage");

	}
	else{

		header("Location: ../admin.php?invalidadminpwd");
	}
}
else{
	header("Location: ../index.php?login=error");
	exit();

}