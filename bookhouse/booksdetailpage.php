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
$aname=$_POST['bookno'];
$_SESSION['bookno']=$aname ;
//$users = $_POST['txtusername'];
$users=$_SESSION['txtusername'];
$no=$_SESSION['custno'];
if($aname==NULL)
{
header("location: booksdetail.php");
}

?>

<?php
$sql3="select bookname,firstname,publishername,isbn,edition from authors,publishers,books where books.author1no=authors.authorno and books.publisherno=publishers.publisherno and books.bookno=$aname";
$res=mysql_query($sql3) or die ("error");
$numrows=mysql_numrows($res);
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{
while($row = mysql_fetch_row($res))
{
echo "<BR>";
echo "BOOKNAME        : ";
echo $row[0];
echo "<br>";
echo "AUTHOR NAME         : ";
echo $row[1];
echo "<br>";
echo "PUBLISHER NAME    : ";
echo $row[2];
echo "<br>";
echo "ISBN : ";
echo $row[3];
echo "<br>";
echo "EDITION         :";
echo $row[4];
echo "<br>";
echo "<br>";
echo '- - - - -<br>';
echo " <a href='cart11.php?action=add_item&id=".$row[0]."&id1=".$no."'>Add Item</a><br>";
echo " <a href='cart21.php?action=remove_item&id=".$row[0]."&id1=".$no."'>Remove Item</a><br>";
}
include 'cart1.php';

$cart=rand(10,30);
echo $cart;
$_SESSION['cartid']=$cart;
echo $_SESSION['cartid'];
echo '<br> Items in basket<br>- - - - -<br>';

ShowCart($no);
}


?>

</body>





