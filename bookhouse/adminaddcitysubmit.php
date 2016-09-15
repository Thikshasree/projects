<html>
<body>
<title>Adminstration Manage City</title>
<form action="adminaddcitysuccess.php">
<a href="adminmanagecountries.php">Countries</a>

<a href="adminmanageauthors.php">Authors<br><br></a>
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


$no=$_POST['citystateno'];
$city1=$_POST['city'];
$state1=$_POST['state'];
if ($no==NULL || $city1==NULL || $state1==NULL)
{
header("location: adminaddcity.php");
break;
}
$query="select * from citystate where citystateno='$no'or city='$city1'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
echo "City  already exist";
}
else
{
$sql2="insert into `test`.`citystate`
	            values ('$no','$state1','$city1')";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "City  added successfully";
}
}

?>



