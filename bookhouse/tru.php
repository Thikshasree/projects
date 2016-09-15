<html>
<body>
<title>Adminstration Homepage</title>
<form action="adminhome.php">
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
$errmsg_arr = array();
$errflag = false; 
//echo "Database connection established";
//echo $rem1;
//$log=$_POST['adminlogin'];
$rem=$_POST['chkrem'];
if($_POST['adminlogin']=="login")
{
$user=$_POST['txtusername'];
$pass=$_POST['txtpassword'];
if($user == '') 
{
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
}
if($pass == '') 
{
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
}
$query="select * from user where username='$user'and pass='$pass'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if(mysql_num_rows($numrows) > 0)
{
echo "Welcome $user you have been Sucessfully logged in";
header("location: adminhome.php");
echo "<br>";
$rem=$_POST['chkrem'];
if($rem!=0)
{
setcookie("validuser",$user,time()+3600*24*2);
setcookie("validpass",$pass,time()+3600*24*2);
}
}
//echo $numrows;
else
{

			$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: adminlogin.php");
				exit();
echo "<br>";
}
}
}
?>
</body>
</html>