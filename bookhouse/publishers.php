<p class = "oblique"><h1><center><b><i> AVAILABLE PUBLISHERS</i></b></h1><br>
<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
$query="select  publisherno,publishername from publishers";
$res1=mysql_query($query) or die ("error");
$numrow1=mysql_numrows($res1);
//$result2 = @mysql_query($queryu,$connection) or die(mysql_error());

while($row=mysql_fetch_row($res1))
{
echo 'PUBLISHER NO-';
echo "<b>{$row[0]}</b>";
echo "<br>";
echo 'PUBLISHER NAME-';
echo "<b>{$row[1]}</b>";
echo "<br>";
echo "<br>";
}
?>