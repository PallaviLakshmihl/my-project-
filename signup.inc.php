<?php    /*to check whether the submit is clicked or not in sign up page*/

if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php'; 
	$first = mysqli_real_escape_string($conn, $_POST['first']) ;/*we need escape string bcoz if user enters some sort of  code that will be converted normal text which won't  be dangerous*/
	$last = mysqli_real_escape_string($conn, $_POST['last']) ;/*post method to insert into database wht he entered in signup page*/
	$email = mysqli_real_escape_string($conn, $_POST['email']) ;
	$uid = mysqli_real_escape_string($conn, $_POST['uid']) ;
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']) ;
	$phno= mysqli_real_escape_string($conn, $_POST['phno']) ;
	$address = mysqli_real_escape_string($conn, $_POST['address']) ;


	//error handlers
	//chech for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($phno) || empty($address)) {
		header("Location: ../signup.php?signup=empty");
		exit();

	}
	else{
			//check if input charaters are valid
			/*while entering the string in sign up page we can include an characters mentioned below in preg_match it will check it*/
		if (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)  || !preg_match("/^[0-9]*$/",$phno)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
			
		}
		
		else{
			/*if entered first and last name properly then go for email*/
			//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			}

			else{
				/* to check whether username already is there in the database*/

				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				/* if uid is already exists not accepting the input and redirecting it to sign up page*/
				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}

				else{
					//Hashing the password
					/*after hashing the password it will be stored in the database*/
					//$HashedPwd= password_hash($pwd, PASSWORD_DEFAULT);
					//insert the user into database 
					$sql="INSERT INTO users  (user_first,user_last,user_email,user_uid,user_pwd,phno,address) VALUES ('$first','$last','$email','$uid','$pwd','$phno','$address');";
					mysqli_query($conn,$sql);
					header("Location: ../index.php?signup=success");
					exit();


				}

			}
		}
	}

}

/*if submit button is not pressed in sign up page redirect to sign up page*/
else {
	header("Location: ../signup.php");
	exit();


}