<?php

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
$queryup="select * from cart";
$res1=mysql_query($queryup) or die ("error"); 
while($row = mysql_fetch_row($result))
{
$quert="insert into transactionmaster (transactionno,bookname,qty) values($transactionno,

//echo $users;
?>