<?php
if($_POST['adminlogin']=="login")
{
session_start(); 
$_session['txtusername']=$_POST['txtusername'];
echo $_session['txtusername'];
$user=$_POST['txtusername'];
$pass=$_POST['txtpassword'];
$query="select * from customers where username='$user'and password='$pass'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
}
?>