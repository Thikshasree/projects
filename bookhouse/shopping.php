<?php
session_start();
	
	include("func.php");
	
	if($_REQUEST['command']=='delete' && $_REQUEST['bid']>0){
		remove_product($_REQUEST['bid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$bid=$_SESSION['cart'][$i]['bookno'];
			$q=intval($_REQUEST['product'.$bid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<script language="javascript">
	function del(bid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.bid.value=bid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}


</script>
</head>

<body>
<form name="form1" method="post">
<input type="hidden" name="bid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; width:600px;" >
    <div style="padding-bottom:10px">
    	<h1 align="center">Your Shopping Cart</h1>
    <input type="button" value="Continue Shopping" onclick="window.location='prod.php'" />
    </div>
    	<div style="color:#F00"><?php echo $msg?></div>
    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>bookno</td><td>bookName</td><td>cost</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$bid=$_SESSION['cart'][$i]['bookno'];
					$q=$_SESSION['cart'][$i]['qty'];
					$bname=get_product_name($bid);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td><?php echo $i+1?></td><td><?php echo $bname?></td>
                    <td>$ <?php echo get_price($bid)?></td>
                    <td><input type="text" name="product<?php echo $bid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>                    
                    <td>$ <?php echo get_price($bid)*$q?></td>
                    <td><a href="javascript:del(<?php echo $bid?>)">Remove</a></td></tr>
            <?php					
				}
			?>
				<tr><td><b>Order Total: $<?php echo get_order_total()?></b></td><td colspan="5" align="right"><input type="button" value="Clear Cart" onclick="clear_cart()"><input type="button" value="Update Cart" onclick="update_cart()"><input type="button" value="Place Order" onclick="window.location='bill.php'"></td></tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
    </div>
</form>
</body>
</html>