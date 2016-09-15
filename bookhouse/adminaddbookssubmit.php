<html>
<body>
<title>Adminstration Manage Books</title>


<a href="adminmanageauthors.php">Authors<br><br></a>
<a href="adminmanagepublishers.php">Publishers<br><br></a>

<a href="adminmanageusers.php">Users<br><br></a>
<a href="adminmanagecountries.php">Countries<br><br></a>
<a href="adminmanagecitystate.php">Cities<br><br></a>
<a href="adminmanageauthors.php">Authors<br><br></a>
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
$bno=$_POST['bookno'];
$bname=$_POST['bookname'];
$ano1=$_POST['firstauthor'];
$ano2=$_POST['secondauthor'];
$ano3=$_POST['thirdauthor'];
$ano4=$_POST['fourthauthor'];
$pno=$_POST['pno'];
$cno=$_POST['categoryno'];
$isbn=$_POST['isbn'];
$edit=$_POST['edition'];
$cost=$_POST['cost'];

if ($bno==NULL || '$bname'==NULL || $pno==NULL || $cno==NULL || $isbn==NULL || '$edition'==NULL || $cost==NULL || $ano1==NULL)
{
header("location:adminaddbooks.php");
echo "Field empty";
exit;
}
else
{
$query="select * from books where bookno=$bno";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
echo "Book  already exist";
}
else
{
$sql2="insert into books(bookno,bookname,author1no,author2no,author3no,author4no,publisherno,categoryno,isbn,edition,cost)
	            values ($bno,'$bname',$ano1,$ano2,$ano3,$ano4,'$pno',$cno,$isbn,'$edit',$cost)";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Book added successfully";
}
}
}
?>

