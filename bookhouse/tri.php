<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
$query="insert into emp values(1,'jkl',890)";
$res=mysql_query($query) or die ("error");
$newrow=mysql_newrows($res);
$sql="create trigger regis_ins_login after insert `test`.`emp` 
	        referencing new as newrow
			begin
			insert into `test`.`emp1` values(:newrow.lno,:newrow.name,:newrow.password);
			end regis_ins_login;"
            		?>	
<html>
<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Success</title>
<style type="text/css">
.style1 {
	color: #FFFFFF;
	font-family: "Tiranti Solid LET";
	text-align: center;
	font-size: 40pt;
	text-decoration: underline;
}
.style2 {
	font-size: xx-large;
	font-family: Cambria;
	color: #00FF00;
	text-align: center;
}
</style>
</head>

<body>


</body>

</html>		