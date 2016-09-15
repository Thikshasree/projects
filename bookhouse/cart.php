<?php

$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
if(isset($_POST['bid']))//check if additem variable is set and is not NULL
{  
$transactionno="1";
$query3="select max(transactionno) + 1 as 'transactionno' from transactionmaster";
$rs=mysql_query($query3);
$row=mysql_fetch_row($rs);
if($row)
{
echo $row[0];
$transactionno=$row[0];
}
session_start();
$users=$_SESSION['txtusername'];
echo $users;
$qty=$_POST['qty'];
$queryt="insert into transactionmaster(transactionno,transactiondate,transactionusername)values('$transactionno',NOW(),'".$_SESSION['txtusername']."')"; 
$rs1=mysql_query($queryt);
foreach($_SESSION['cart'] as $value)
{
$querydetails="insert into transactiondetail(transactionno,bookname,cost)values($transactionno,'".$value['bname']."','".$value['cost']."')";
$rsinser=mysql_query($querydetails);
}
}
?>