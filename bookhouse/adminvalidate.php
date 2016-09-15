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
//echo "Database connection established";
//echo $rem1;
//$log=$_POST['adminlogin'];
$rem=$_POST['chkrem'];
if($_POST['adminlogin']=="login")
{
$user=$_POST['txtusername'];
$pass=$_POST['txtpassword'];
$query="select * from systemusers where username='$user'and password='$pass'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if(!$numrows)
{
echo "<br>";
header("location: adminlogin.php");
}
//echo $numrows;
else
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
}
?>
</body>
</html>