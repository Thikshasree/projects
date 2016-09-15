<html>
<body>
<title>Adminstration Manage Users</title>
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanageauthors.php">Authors<br><br></a>
<a href="adminmanagepublishers.php">Publishers<br><br></a>

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


$uno=$_POST['userno'];
$uname=$_POST['uname'];
$pass1=$_POST['pass'];
$cpass1=$_POST['cpass'];
$email1=$_POST['email'];
$first=$_POST['fname'];
$last=$_POST['lname'];
$countries=$_POST['countries'];
$cities=$_POST['cities'];
$authors=$_POST['authors'];
$publishers=$_POST['publishers'];
$categories=$_POST['categories'];
$users=$_POST['users'];
$books=$_POST['books'];
$customers=$_POST['customers'];
$transactions=$_POST['transactions'];
$stat=$_POST['stat'];

if ($pass1==NULL || $pass1!=$cpass1||'$fname'==NULL || '$lname'==NULL || '$email'==NULL || '$uname'==NULL )
{
header("location:adminaddusers.php");
echo "Field empty";
exit;
}




else
{
$query="select * from systemusers where userno=$uno";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
echo "User  already exist";
}
else
{
$sql2="insert into systemusers (userno,username,password,emailaddress,firstname,lastname,managecountries,managecitystate,manageauthors,managepublishers,managecategories,manageusers,managebooks,managecustomers,managetransactions,status)values($uno,'$uname','$pass1','$email1','$first','$last','$countries','$cities','$authors','$publishers','$categories','$users','$books','$customers','$transactions','$stat')";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Users added successfully";
}
}
}
?>
</body>
</html>


