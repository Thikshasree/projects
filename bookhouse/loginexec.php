<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");

	//Start session
	session_start();
 
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$user = clean($_POST['txtusername']);
	$pass = clean($_POST['txtpassword']);
 
	//Input Validations
	if($user == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($pass == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index1.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM order WHERE username='$user' AND password='$pass'";
	$result=mysql_query($qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			
			$_SESSION['SESS_FIRST_NAME'] = $order['username'];
			$_SESSION['SESS_LAST_NAME'] = $order['password'];
			session_write_close();
			header("location: adminhome.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: index1.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>
