<?php
$check1=$_POST['mydropdown'];
echo "$check1";
if($check1=='author')
{
header("location: authorsdetail.php");
}
if($check1=='publisher')
{
header("location: publishersdetail.php");
}
if($check1=='book')
{
header("location: booksdetail.php");
}
?>