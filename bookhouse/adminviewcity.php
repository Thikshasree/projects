<html>
<body>
<title>Adminstration Manage City</title>
<form action="adminaddcitysuccess.php">
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanageauthors.php">Authors</a>
<a href="adminmanagepublishers.php">Publishers</a>

<a href="adminmanageusers.php">Users</a>
<a href="adminmanagebooks.php">Books</a>
<a href="adminmanagecustomers.php">Customers</a>
<a href="adminmanagetransactions.php">transactions</a>
<a href="adminmanagelogout.php">Logout</a>
<br><br>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";


;

$query="select * from citystate";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
while($row = mysql_fetch_row($res))
{
echo "<BR>";
echo "Citystateno : ";
echo $row[0];
echo "<BR>";
echo "state : ";
echo $row[1];
echo "<BR>";
echo "city  : ";
echo $row[2];
echo "<BR>";
}
?>



