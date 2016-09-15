
<?php
 session_start();
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
include 'cart1.php';

 $aname=$_SESSION['authorno'] ;
$no=$_SESSION['custno'];
$query = "select bookno,bookname,cost from books,authors where authors.authorno=books.author1no and authors.authorno=$aname";
$result = mysql_query($query);
 
echo 'Shop items<br>';
echo '- - - - -<br>';
 
while($row = mysql_fetch_array($result)) {
	echo $row['bookname'];
	echo ' - ';
echo "<br>";	
	echo " <a href='cart1.php?action=add_item&id=".$row['bookno']."&id1=".$no."'>Add Item</a><br>";
//ShowCart($row['bookno']);
 
echo " <a href='cart2.php?action=remove_item&id=".$row['bookno']."&id1=".$no."'>Remove Item</a><br>";
echo '- - - - ------------------------------------------------------------------------------------------<br>';
}
 
echo '<br><b> Items in cart</b><br>- - - - ------------<br>';
ShowCart();
echo '<b>Your Shoping Is Successful</b>';
echo "<br>";
echo '<b>Pay The Cash During Delivery</b>'; 
?>