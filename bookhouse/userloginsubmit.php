<html>
<body>
<title>Adminstration Homepage</title>

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
$query="select * from customers where username='$user'and password='$pass'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if(!$numrows)
{
echo "<br>";
header("location: userlogin.php");
}
//echo $numrows;
else
{
echo "Welcome $user you have been Sucessfully logged in";
$query="delete from cart";
$res=mysql_query($query) or die ("error");
header("location: userhome.php");
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