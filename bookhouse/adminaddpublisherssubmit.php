<html>
<body>
<title>Adminstration Manage Publishers</title>
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
if ($pno==NULL||$pname==NULL || $email==NULL)
{
header("location:adminaddpublishers.php");
echo "Field empty";
break;
}

else
{
$query="select * from publishers where publisherno='$pno'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
echo "Publisher  already exist";
}
else
{
$sql2="insert into `test`.`publishers`
	            values ($pno,'$pname','$add1','$add2','$city','$pin','$country','$email')";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Publisher added successfully";
}
}
}
?>



