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


$no=$_POST['countryno'];
$country=$_POST['country'];

if ($no==NULL || $country==NULL )
{
header("location: adminaddcountries.php");
break;
}
$query="select * from countries where countryno='$no'or country='$country'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
echo "Country  already exist";
}
else
{
$sql2="insert into `test`.`countries`
	            values ('$no','$country')";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Country added successfully";
}
}

?>



