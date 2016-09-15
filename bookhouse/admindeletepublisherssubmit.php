<html>
<body>
<title>Adminstration Manage Publishers</title>
<form action="adminaddcitysuccess.php">
<a href="adminmanageauthors.php">Authors<br><br></a>
<a href="adminmanagecountries.php">Countries<br><br></a>
<a href="adminmanagecitystate.php">Cities<br><br></a>
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
if($pno==NULL)
{
header("location: admindeletepublishers.php");
break;
}
//$country1=$_POST['country'];
$query="select * from publishers where publisherno='$pno'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
$sql2="delete from `test`.`publishers` where publisherno='$pno'";
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Deleted successfully";
}
}
else
{
echo "Invalid Publisher Number";
}

?>



