<html>
<body>
<title>Adminstration Manage Author</title>
<form action="adminupdateauthorsuccess.php">
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanagepublishers.php">Publishers<br><br></a>

<a href="adminmanageusers.php">Users<br><br></a>
<a href="adminmanagebooks.php">Books<br><br></a>
<a href="adminmanagecustomers.php">Customers<br><br></a>
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


$ano=$_POST['authorno'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$add1=$_POST['address1'];
$add2=$_POST['address2'];
$city=$_POST['citystate'];
$pin=$_POST['pincode'];
$country=$_POST['country'];
$deg=$_POST['degree'];
$email=$_POST['email'];
$spec=$_POST['speciality'];
$dob=$_POST['dob'];


if ($ano==NULL || $spec==NULL || $dob==NULL || $fname==NULL || $lname==NULL || $email==NULL)
{
header("location:adminupdateauthor.php");
echo "Field empty";
break;
}
$query="select * from authors where authorno='$ano'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
$sql3="update  authors set firstname='$fname',lastname='$lname',address1='$add1',address2='$add2',citystate='$city',pincode='$pin',country='$country',degree='$deg',emailaddress='$email',speciality='$spec',dateofbirth='$dob' where authorno='$ano' ";
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{
echo "updated successfully ";
}
}

else
{
echo "Invalid Author Number";
}
?>
