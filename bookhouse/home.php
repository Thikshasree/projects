<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
echo "Database connection established";
//$query1 = "INSERT INTO Author(Authorid, Dob) VALUES (3,'30/06/1990')";
//@mysql_query($query1) or die ("Execution of the SQl Execution");


$d='dob';
$table='Author';
$id='authorid';
$val=1;

$query2="SELECT $d FROM $table where $id=$val";
$resultset=mysql_query($query2) or die ("Error");
//$numrows=mysql_numrows($resultset);
while($row = mysql_fetch_row($resultset))
{
echo "<BR>";
echo "Authorid";
echo $row[0];
//echo $row[1];
}

?>