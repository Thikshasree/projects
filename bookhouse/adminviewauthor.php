<html>
<body>
<title>Adminstration Manage Author</title>
<form action="adminaddauthorssuccess.php">
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
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

$query="select * from authors";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
while($row = mysql_fetch_row($res))
{
echo "<BR>";
echo "Firstname : ";
echo $row[1];
echo "<BR>";
echo "Lastname: ";
echo $row[2];
echo "<BR>";
echo "Degree: ";
echo $row[8];
echo "<BR>";
echo "Emailid: ";
echo $row[9];
echo "<BR>";
echo "Speciality: ";
echo $row[10];
echo "<BR>";
echo "<br>";


}
?>



