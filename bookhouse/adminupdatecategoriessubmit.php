<html>
<body>
<title>Adminstration Manage Category</title>
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanagepublishers.php">Publishers<br><br></a>
<a href="adminmanageauthors.php">Authors<br><br></a>
<a href="adminmanageusers.php">Users<br><br></a>
<a href="adminmanagebooks.php">Books<br><br></a>
<a href="adminmanagecustomers.php">Customers<br><br></a>
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


$cno=$_POST['categoryno'];
$category=$_POST['category'];
$description=$_POST['description'];

if ($cno==NULL || $category==NULL || $description==NULL )
{
header("location:adminaddcategories.php");
echo "Field empty";
break;
}

$query="select * from categories where categoryno='$cno'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
$sql3="update  categories set category='$category',description='$description' where categoryno='$cno' ";
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{
echo "updated successfully ";
}
}

else
{
echo "Invalid Category Number";
}
?>
