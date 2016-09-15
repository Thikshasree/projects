<html>
<body>
<title>Author Details Page</title>
<a href="adminmanagecitystate.php">New Releases</a>
<a href="authorsdetail.php">Authors</a>
<a href="adminmanagepublishers.php">Publishers</a>
<a href="adminmanagecategories.php">Updated Books</a>
<a href="adminmanageusers.php">Users</a>
<a href="adminmanagebooks.php">Books</a>
<a href="adminmanagecustomers.php">Customers</a>
<a href="adminmanagetransactions.php">transactions</a>
<a href="adminmanagelogout.php">Logout</a>
<br><br>
</html>
</body>
<?php

$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
$aname=$_POST['authorname'];
if('$aname'==NULL)
{
header("location: authorsdetail.php");
exit;
}
$sql3="select degree,emailaddress,speciality,dateofbirth,bookname from books,authors where authors.authorno=books.author1no and authors.firstname='$aname'";
$res=mysql_query($sql3) or die ("error");
$numrows=mysql_numrows($res);
$result1 = @mysql_query($sql3,$connection) or die(mysql_error());
if($result1!=0)
{
while($row = mysql_fetch_row($res))
{
echo "<BR>";
echo "DEGREE        : ";
echo $row[0];
echo "<br>";
echo "EMAIL         : ";
echo $row[1];
echo "<br>";
echo "SPECIALITY    : ";
echo $row[2];
echo "<br>";
echo "DATE OF BIRTH : ";
echo $row[3];
echo "<br>";
echo "BOOK NAME     : ";
echo $row[4];
echo "<br>";
?>
<div class="header" >
<form action="addtocart.php" method="post"> 
	   
	    <td> </td> 
	    <td><strong>Quantity</strong></td> 
	    <td><label> 
	     <select name="qty">; 
	<?php 
	  for($i=1; $i<12; $i++) { 
	 echo '<option value='.$i.'>'.$i.'</option>'; 
	     } 
	?> 
	 </select> 
	    </label> 
	   </td> 
	    <input name="bid" type="hidden" value="<?php echo $row['authorno']?>" /></td> 
	  </tr> 	  <tr> 
	    <td> </td> 
	    <td> </td> 
	    <td><label> 
	      <input type="submit" name="submit" value="Add to Cart" /> 
	    </label></td> 
	  </tr> 
  </form> 
</div>

<?php

}
}

else
{
 echo "Invalid Author Number";
}
?>
</body>	
 </html>
