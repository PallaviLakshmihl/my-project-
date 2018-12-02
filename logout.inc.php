<?php

if (isset($_POST['submit'])) {
	session_start();//start session 
	session_unset();/* unset all the session variables inside session*/
	session_destroy();
	header("Location: ../index.php");
	exit();
}

?>