<?php

$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
$aname=$_POST['authorname'];
if($aname==NULL)
{
header("location: authorsdetail.php");
}
$query2="select firstname,lastname,degree,emailaddress,speciality,dateofbirth from authors where authors.firstname='$aname'";//start display products
$res1=mysql_query($query2) or die ("error");
$numrow1=mysql_numrows($res1);
$result2 = @mysql_query($query2,$connection) or die(mysql_error());
$row=mysql_fetch_row($res1);
?>
<body>
<div style=" width:1080px; margin:0 auto;">
<div style="float:left; width:700px;height:100%;padding:20px;"><h2><?php echo $row[0];?><?php echo $row[1];?></h2>
<?php
if($result2==0)
{
echo "invalid";
}
if($result2!=0)
{
if($numrow1)
{
echo "<BR>";
echo "DEGREE        : ";
echo $row[2];
echo "<br>";
echo "EMAIL         : ";
echo $row[3];
echo "<br>";
echo "SPECIALITY    : ";
echo $row[4];
echo "<br>";
echo "DATE OF BIRTH : ";
echo $row[5];
echo "<br>";
echo "<br>";
}
}


	
	
?>
<?php
include("func.php");
	

		$bid=$_REQUEST['bookno'];
		addtocart($bid,1);
		header("location:shopping.php");
		exit();
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<script language="javascript">
	function addtocart(bid){
		document.form1.bookno.value=bid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
</head>


<body>
<form name="form1">
	<input type="hidden" name="bookno" />
    <input type="hidden" name="command" />
</form>
<div align="center">
	<h1 align="center">Products</h1>
	<table border="0" cellpadding="2px" width="600px">
		<?php
			$result=mysql_query("select * from books") or die("select * from products"."<br/><br/>".mysql_error());
			while($row=mysql_fetch_array($result)){
		?>
    	<tr>
        
            <td>   	<b><?php echo $row['bookname']?></b><br />
            		
                    Price:<big style="color:green">
                    	$<?php echo $row['cost']?></big><br /><br />
                    <input type="button" value="Add to Cart" onclick="addtocart(<?php echo $row['bookno']?>)" />
			</td>
		</tr>
        <tr><td colspan="2"><hr size="1" /></td>
<?php
}

?>       
    </table>
</div>
</body>
</html>







