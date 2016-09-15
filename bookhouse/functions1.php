<?php
	function get_product_name($bookno){
		$result=mysql_query("select bookname from books where serial=$bookno") or die("select bookname from books where serial=$bookno"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['bookname'];
	}
	function get_price($bookno){
		$result=mysql_query("select cost from books where serial=$bookno") or die("select cost from books where serial=$bookno"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['cost'];
	}
	function remove_product($bookno){
		$bookno=intval($);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($bookno==$_SESSION['cart'][$i]['bookno']){
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
			$bookno=$_SESSION['cart'][$i]['bookno'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($bookno);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($bookno,$q){
		if($bookno<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['bookno']=$bookno;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['bookno']=$bookno;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($bookno){
		$bookno=intval($bookno);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($bookno==$_SESSION['cart'][$i]['bookno']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>