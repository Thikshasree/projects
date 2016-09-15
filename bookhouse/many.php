<html>

<head>
</head>
<body>
city:
<select value='new'>
<option value="c">select</option>
</body>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";



$whereClauses = array(); 
if (! empty($_POST['city'])) $whereClauses[] ="city='".mysql_real_escape_string($_POST['city'])."'"; 
//if (! empty($_POST['Jobs'])) $whereClauses[] ="Jobs='".mysql_real_escape_string($_POST['Jobs'])."'"; 
$where = ''; 
if (count($whereClauses) > 0) { $where = ' WHERE '.implode(' AND ',$whereClauses); } 

$sql = mysql_query("SELECT city FROM citystate"); 

$result=mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
echo $row['city'];
//echo $row['Jobs'];
}
?>
<body>
country:
<select name='new'>
<option value="c">select</option>
</body>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";



$whereClauses = array(); 
if (! empty($_POST['country'])) $whereClauses[] ="country='".mysql_real_escape_string($_POST['country'])."'"; 
//if (! empty($_POST['Jobs'])) $whereClauses[] ="Jobs='".mysql_real_escape_string($_POST['Jobs'])."'"; 
$where = ''; 
if (count($whereClauses) > 0) { $where = ' WHERE '.implode(' AND ',$whereClauses); } 

$sql = mysql_query("SELECT country FROM countries $limit".$where); 

$result=mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
echo $row['country'];
//echo $row['Jobs'];
}
?>

</html>




