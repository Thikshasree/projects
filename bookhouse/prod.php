<?php
	include("includes/functions.php");
	
	if($_REQUEST['command']=='add' && $_REQUEST['bookno']>0){
		$bid=$_REQUEST['bookno'];
		addtocart($bid,1);
		header("location:shopping.php");
		exit();
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<script language="javascript">
	function addtocart(bid){
		document.form1.productid.value=bid;
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
        <?php } ?>
    </table>
</div>
</body>
</html>
