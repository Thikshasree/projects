<html>
<body>
<title>Adminstration Manage Publisher</title>

<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanageauthors.php">Authors</a>

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

$query="select * from publishers";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
while($row = mysql_fetch_row($res))
{
echo "<BR>";
echo "Publishername : ";
echo $row[1];
echo "<BR>";
echo "Emailid: ";
echo $row[7];
echo "<BR>";
echo "<br>";


}
?>



