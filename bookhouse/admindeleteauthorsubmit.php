<html>
<body>
<title>Adminstration Manage Authors</title>
<form action="adminaddcitysuccess.php">
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanagecitystate.php">Cities</a>
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
if($ano==NULL)
{
header("location: admindeleteauthor.php");
break;
}
//$country1=$_POST['country'];
$query="select * from authors where authorno='$ano'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
$sql2="delete from `test`.`authors` where authorno='$ano'";
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Deleted successfully";
}
}
else
{
echo "Invalid Author Number";
}

?>



