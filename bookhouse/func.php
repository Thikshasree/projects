<?php
	function get_product_name($bid){
		$result=mysql_query("select bookname from books where bookno=$bid") or die("select bookname from books where bookno=$bid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['bookname'];
	}
	function get_price($bid){
		$result=mysql_query("select cost from books where bookno=$bid") or die("select bookname from books where bookno=$bid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['cost'];
	}
	function remove_product($bid){
		$bid=intval($bid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($bid==$_SESSION['cart'][$i]['bookno']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$bid=$_SESSION['cart'][$i]['bookno'];
			$q=$_SESSION['cart'][$i]['qty'];
			$cost=get_price($bid);
			$sum+=$cost*$q;
		}
		return $sum;
	}
	function addtocart($bid,$q){
		if($bid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($bid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['bookno']=$bid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['bookno']=$bid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($bid){
		$bid=intval($bid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($bid==$_SESSION['cart'][$i]['bookno']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>