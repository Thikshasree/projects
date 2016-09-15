s<?php
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
if(isset($_GET['bookno']))
{
if(!is_numeric($_GET['bookno']))
{
$error=true;
$errormsg="security,serious error.contact";
}
else
{
$cbid=mysql_escape_string($_GET['bookno']);
$query="select * from books where bookno='".$cbid.'
$result=mysql_query($query);
if($results)
{
$num=mysql_num_rows($results);
$row=mysql_fetch_assoc($results);

}
}
else
{
$error=true;
$erroemsg=mysql_error();
}
}
}
?> 
	<body> 
	<table width="100%" border="0"> 
	  <tr> 
	    <td colspan="3"><h1>Pleasure Reading Inc. - Book Detail </h1></td> 
	  </tr> 
 
	  <tr> 
	    <td width="12%"> </td> 
	    <td width="19%"> </td> 
	    <td width="69%"> </td> 
	  </tr> 
	  <tr>  
	    <td> </td> 
	    <td> </td> 
	  </tr> 
	  <tr> 
	    <td><strong>Price:</strong></td> 
	    <td><?php echo $row['cost'];?></td> 
	  </tr> 
	  <tr> 
	    <td><strong>ISBN:</strong></td> 
	    <td><?php echo $row['ISBN'];?></td> 
	  </tr> 

	  
</table> 
	</body> 


<form action="addtocart.php" method="post"> 
	  <tr> 
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
	    <input name="bid" type="hidden" value="<?php echo $row['bookno']?>" /></td> 
	  </tr> 	  <tr> 
	    <td> </td> 
	    <td> </td> 
	    <td><label> 
	      <input type="submit" name="submit" value="Add to Cart" /> 
	    </label></td> 
	  </tr> 
	  </form> 	