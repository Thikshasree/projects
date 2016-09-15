<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
$date1=$_POST['tdate'];
//$search1=$_POST['search'];

if ($date1==NULL)
{
header("location:adminmanagetransactions.php");
echo "Field empty";
exit;
}
$query="select * from transactionmaster where transactiondate='$date1'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
while($row = mysql_fetch_row($res))
{
echo "<BR>";
echo "Transaction Number : ";
echo $row[0];
echo "<BR>";
echo "Username: ";
echo $row[2];
echo "<BR>";
echo "Amount: ";
echo $row[3];
echo "<BR>";
echo "Book Name: ";
echo $row[4];
echo "<BR>";
echo "<br>";
}
}
else 
{
echo "No transactions are available for selected date";
}

?>