<html>
<body>
<div style="font-size:150%;float:right;">
<a href="userlogin.php">Logout</a>
</div>
</body>
</html>
<?php
session_start();
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
$aname=$_POST['authorno'];
$_SESSION['authorno']=$aname ;
//$users = $_POST['txtusername'];
$users=$_SESSION['txtusername'];
$no=$_SESSION['custno'];
if($aname==NULL)
{
header("location: authorsdetail.php");
break;
}
$query="select * from authors where authorno='$aname'";
$res=mysql_query($query) or die ("error");
$numrows=mysql_numrows($res);
if($numrows)
{
$query2="select firstname,lastname,degree,emailaddress,speciality,dateofbirth from authors where authors.firstname='$aname' or authors.lastname='$aname' or concat(authors.firstname,authors.lastname)='$aname'";//start display products
$res1=mysql_query($query2) or die ("error");
$numrow1=mysql_numrows($res1);
$result2 = @mysql_query($query2,$connection) or die(mysql_error());
$row=mysql_fetch_row($res1);
?>
<body>
<div style=" width:1080px; margin:0 auto;">
<div style="float:left; width:700px;height:100%;padding:20px;"><h2><?php echo $row[0];?><?php echo $row[1];?></h2>
<?php


if($result2!=0)
{
if($numrow1)
{
echo "<BR>";
echo " <b> DEGREE  </b>      : ";
echo $row[2];
echo "<br>";
echo " <b> EMAIL   </b>      : ";
echo $row[3];
echo "<br>";
echo "<b>  SPECIALITY </b>   : ";
echo $row[4];
echo "<br>";
echo "<b>  DATE OF BIRTH </b>: ";
echo $row[5];
echo "<br>";
echo "<br>";
}
}
}
else
{
echo "Invalid Author Name";
}
echo '- - - - ------------------------------------------------------------------------------------------<br>';
$sql3="select bookno,bookname,cost,publishername,edition from books,authors,publishers where books.publisherno=publishers.publisherno and (authors.authorno=books.author1no or authors.authorno=books.author2no or authors.authorno=books.author3no or authors.authorno=books.author4no) and (authors.firstname='$aname' or authors.lastname='$aname' or concat(authors.firstname,authors.lastname)='$aname')";
$res=mysql_query($sql3) or die ("error");
$numrows=mysql_numrows($res);
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{

while($row = mysql_fetch_row($res))
{
echo 'Shop items<br>';
echo "<b> BOOK NO  </b>     : ";
echo $row[0];
echo "<br>";
echo "<b> BOOK NAME </b>    : ";
echo $row[1];
echo "<br>";
echo "<b> COST      </b>    : ";
echo $row[2];
echo "<br>";
echo "<b>EDITION</b>        : ";
echo $row[4];
echo "<br>";
echo "<b>PUBLISHER NAME</b> : ";
echo $row[3];
echo "<br>";

echo " <a href='cart1.php?action=add_item&id=".$row[0]."&id1=".$no."'>Add Item</a><br>";
echo " <a href='cart2.php?action=remove_item&id=".$row[0]."&id1=".$no."'>Remove Item</a><br>";
echo '- - - - ------------------------------------------------------------------------------------------<br>';
}
include 'cart1.php';

$cart=rand(10,30);
//echo $cart;
$_SESSION['cartid']=$cart;
//echo $_SESSION['cartid'];
echo '<b><br> Items in cart</b><br>----------------<br>';

ShowCart($no);
}


?>

</body>





