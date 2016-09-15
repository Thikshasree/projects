<html>
<body>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
//$cno=$_POST['custno'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$email=$_POST['email'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$add1=$_POST['add1'];
$add2=$_POST['add2'];
$city=$_POST['city'];
$pin=$_POST['pin'];
$country=$_POST['country'];
$dob=$_POST['dob'];
$stat=$_POST['stat'];
DELIMITER $$
create trigger chec
before insert on customers
for each row
begin
if (new.$pass!=$cpass || new.$uname==NULL || new.$dob==NULL || new.$fname==NULL || new.$lname==NULL || new.$email==NULL   || new.$pass==NULL || new.$cpass==NULL ) then
{
print( "Field empty");
header("location:usersignupp.php");
exit;
 //$error = 'ERROR: Please fill in all required fields!';
 //renderForm($ano,$fname, $lname,$add1,$add2,$city,$pin,$country,$deg,$email,$spec, $error, $dob);
}
else
{
$query="select * from customers where username='$uname'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows) then
{
echo "<br>";
echo "Customer  already exist";
}
else
{
$sql2="insert into `test`.`customers`(username,password,emailaddress,firstname,lastname,address1,address2,citystate,pincode,country,dateofbirth,status)
	            values ('$uname','$pass','$email','$fname','$lname','$add1','$add2','$city','$pin','$country','$dob','$stat')";
				
$result1 = @mysql_query($sql2,$connection) or die(mysql_error());
if($result1!=0) then
{
echo "Customer added successfully";
}
}
}
end if;
end;
$$

?>



