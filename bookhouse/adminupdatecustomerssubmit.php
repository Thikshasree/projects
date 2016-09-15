<html>
<body>
<title>Adminstration Manage Customers</title>

<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanageauthors.php">Authors<br><br></a>
<a href="adminmanagepublishers.php">Publishers<br><br></a>

<a href="adminmanageusers.php">Users<br><br></a>
<a href="adminmanagebooks.php">Books<br><br></a>
<a href="adminmanagetransactions.php">transactions</a>
<a href="adminmanagelogout.php">Logout<br><br></a>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";


$no=$_POST['custno'];
$name1=$_POST['uname'];
$pass1=$_POST['pass'];
$cpass=$_POST['cpass'];
$email1=$_POST['email'];
$fname1=$_POST['fname'];
$lname1=$_POST['lname'];
$add11=$_POST['add1'];
$add22=$_POST['add2'];
$city1=$_POST['city'];
$pin1=$_POST['pin'];
$count1=$_POST['country'];
$dob1=$_POST['dob'];
$stat1=$_POST['stat'];

if ($pass1==NULL || $pass1!=$cpass||$no==NULL||'$fname1'==NULL || '$lname1'==NULL || '$email1'==NULL || $dob1==NULL )
{
header("location:adminupdatecustomers.php");
echo "Field empty";
exit;
}

$query="select * from customers where customerno=$no";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
$sql3="update  customers set username='$name1',password='$pass1',emailaddress='$email1',firstname='$fname1',lastname='$lname1',address1='$add11',address2='$add22',citystate='$city1',pincode=$pin1,country='$count1',dateofbirth='$dob1',status='$stat1' where customerno=$no ";
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{
echo "updated successfully ";
}
}

else
{
echo "Invalid Customer Number";
}
?>




