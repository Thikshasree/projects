<html>
<body>
<form action="adminhome.php"?
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//echo "Database connection established";
$rem1="REMEMBER";
//echo $rem1;
$log=$_POST['adminlogin'];
$rem=$_POST['chkrem'];
if($log=="login")
{

$user=$_POST['txtusername'];
$pass=$_POST['txtpassword'];

echo $rem;
$query="select * from user where username='$user'and pass='$pass'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);

if(!$numrows)
{
echo "Invalid login. Please try again";
}
//echo $numrows;
else
{
$rem=$_POST['chkrem'];
if($rem!=0)
{
setcookie("validuser",$user,time()+3600*24*2);
setcookie("validpass",$pass,time()+3600*24*2);
}
/*else
{
$_cookie['validuser']='';
$_cookie['validpass']='';
setcookie("validuser"," ",time()-3600);
setcookie("validpass"," ",time()-3600);
$_SESSION['adminuser']=$user;
}*/
}


}



?>
</body>
</html>