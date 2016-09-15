
<html>
<body>

<form action="userhomesubmit.php" method="post">
<p>SELECT :- 
<select name="mydropdown">

<option value="author">author</option>

</select>
</p>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
session_start();
$users=$_SESSION['txtusername'];
//echo $_SESSION['txtusername'];
?>
<p><br><input type="submit" name="submit" value="submit" ></p>
</body>
</html>
