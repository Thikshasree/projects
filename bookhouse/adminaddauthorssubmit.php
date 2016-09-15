<html>
<body>
<title>Adminstration Manage Author</title>


<a href="adminmanagecountries.php">Countries<br><br></a>
<a href="adminmanagecitystate.php">Cities<br><br></a>
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
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$add1=$_POST['address1'];
$add2=$_POST['address2'];
$city=$_POST['citystate'];
$pin=$_POST['pincode'];
$country=$_POST['country'];
$deg=$_POST['degree'];
$email=$_POST['email'];
$spec=$_POST['speciality'];
$dob=$_POST['dob'];





if ($ano==NULL || $spec==NULL || $dob==NULL || $fname==NULL || $lname==NULL || $email==NULL)
{

print( "Field empty");
header("location:adminaddauthors.php");
exit;
 //$error = 'ERROR: Please fill in all required fields!';
 //renderForm($ano,$fname, $lname,$add1,$add2,$city,$pin,$country,$deg,$email,$spec, $error, $dob);
}

else
{
$query="select * from authors where authorno='$ano'or citystate='$city'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
echo "<br>";
echo "Author  already exist";
}
else
{
$sql2="insert into `test`.`authors`
	            values ($ano,'$fname','$lname','$add1','$add2','$city','$pin','$country','$deg','$email','$spec','$dob')";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0)
{
echo "Author added successfully";
}
}
}
?>



