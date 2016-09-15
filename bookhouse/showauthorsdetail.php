$cart=& $_session['jcart'];
if(!is_object($cart))
$cart=new jcart();
$query="select * from authors where authorno=' ".$request['authorno']."'";
$rs=dbquery($query);
$strnumrows=dbnumrows($rs);
$row=dbfetcharray($rs);
if($strnumrows)
{
<?php
echo $row['firstname'];
?>
<?php
echo $row['lastname'];
?>
<?php
echo $row['degree'];
?>
if($_session['username'])
{
<?php
$cart->display_cart($jcart);
?>
}
<?php
echo $row['emailaddress'];
?>
}