<html>
<body>
<title>Adminstration Manage Publisher</title>
<form action="adminupdatepublishersuccess.php">
<a href="adminmanagecitystate.php">Cities<br><br></a>
<a href="adminmanagecountries.php">Countries<br><br></a>
<a href="adminmanageauthors.php">Authors<br><br></a>

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
$pno=$_POST['publisherno'];
$pname=$_POST['pname'];
$email=$_POST['email'];
$add1=$_POST['address1'];
$add2=$_POST['address2'];
$country=$_POST['country'];
$city=$_POST['citystate'];
$pin=$_POST['pincode'];



if ($pno==NULL || $pname==NULL ||  $email==NULL)
{
header("location:adminupdatepublishers.php");
echo "Field empty";
break;
}
$query="select * from publishers where publisherno='$pno'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
$sql3="update  publishers set publishername='$pname',emailaddress='$email',address1='$add1',address2='$add2',country='$country',citystate='$city',pincode='$pin' where publisherno='$pno' ";
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{
echo "updated successfully ";
}
}

else
{
echo "Invalid Publisher Number";
}
?>
