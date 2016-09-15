<?php
//session_start();
$user="root@localhost";
$pwd="";
$db="test";
$host="localhost";
$connection=@mysql_connect($host,$user,$pwd) or die("Connection failed");
mysql_select_db($db) or die("Could not establish connection");
//$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
//echo "Database connection established";
//database config and connection
 
//the switch gets the variables from the url with the corresponding case
//$users=$_SESSION['txtusername'];
//echo $users;
//$query="insert into cart (uname) values ('".$_SESSION['txtusername']."')";
//$res=mysql_query($query) or die ("error");
//echo   $_SESSION['txtusername']; 
switch(isset($_GET['action'])) {
	//add item from url variable

    case "add_item":
//echo 'hi';
        AddProduct($_GET["id"],$_GET["id1"]);
//header("Location:userlogin.php");
        cost($_GET["id"]);
        ShowCart();
        break;
    //remove item from cart (not implemented yet!)
   
}
 
//function add product to cart
function AddProduct($bookno,$cno) {
$transactionno="1";
$query3="select max(transactionno) + 1 as 'transactionno' from transactionmaster";
$rs=mysql_query($query3);
$row=mysql_fetch_row($rs);
if($row)
{
echo $row[0];
$transactionno=$row[0];
}
session_start();
$users=$_SESSION['txtusername'];
echo $users;
//$qty=$_POST['qty'];
$queryt="insert into transactionmaster(transactionno,transactiondate,transactionusername)values('$transactionno',NOW(),'".$_SESSION['txtusername']."')"; 
$rs1=mysql_query($queryt);

//echo $users;
 
    $result = mysql_query("select count(*) from cart where item = $bookno and cartId=$cno ");
    $row = mysql_fetch_row($result);
    $numRows = $row[0];
 
    if($numRows == 0) {
        //This item doesn't exist in the users cart,
        //we will add it with an insert query
        $query2=("insert into cart(cartId,item,qty) values ($cno,$bookno,1) ");
$res=mysql_query($query2) or die ("error");  
      header("Location: list.php");
    }
    else {
        //This item already exists in the users cart,
        //we will update it instead
        UpdateProduct($bookno,$cno);
    }
}
function RemoveItem($bookno,$cno) {


//echo $users;
 
    $result = mysql_query("select count(*) from cart where item = $bookno and cartId=$cno ");
    $row = mysql_fetch_row($result);
    $numRows = $row[0];
 
    if($numRows == 0) {
        //This item doesn't exist in the users cart,
        //we will add it with an insert query
       
echo 'no item exist';  
      header("Location: list.php");
    }
    else {
        //This item already exists in the users cart,
        //we will update it instead
         
    $query5=("update cart set qty = qty - 1 where  item= $bookno  and cartId=$cno");
$res3=mysql_query($query5) or die ("error");      
header("Location: list.php"); 
    }
}
 
//function update product +1 if product is already in cart 
function UpdateProduct($bookno, $cno) {
    
    $query1=("update cart set qty = qty + 1 where  item= $bookno ");
$res=mysql_query($query1) or die ("error");      
header("Location: list.php");
}
function cost($bookno)
{
 $totalCost = 0;
 //$totalCost2=0;
    $sql = "SELECT *
            FROM cart
            INNER JOIN books
            ON cart.item = books.bookname where books.bookname=$bookno";
 $res1=mysql_query($sql) or die ("error"); 
    //open the table and print a header row
    if ($result=mysql_query($sql)) {
      while ($row=mysql_fetch_array($result)) {
      
        echo $row[cost];
      
        //multiplay quantity and itemprice to get total of 1 product all together
        $totalCost =  $row["cost"];
//$totalCost2=$row["qty"] * $row["cost"];
}
 }   //echo "Total: ";
    //format of the totalcost 2 decimals and overall total
    //echo number_format($totalCost, 2, ".", ",");
$transactionno="1";
$query7="select max(transactionno) as 'transactionno' from transactionmaster";
$rs=mysql_query($query7);
$row=mysql_fetch_row($rs);
if($row)
{
echo $row[0];
$transactionno=$row[0];
}

$queryup="update transactionmaster set amount=".$totalCost." where transactionno=$transactionno";
$res1=mysql_query($queryup) or die ("error"); 
}
 
//select current user shopping cart and get total
function ShowCart(){
   

    $totalCost = 0;
 $totalCost2=0;
    $sql = "SELECT *
            FROM cart
            INNER JOIN books
            ON cart.item = books.bookname ";
 
    //open the table and print a header row
    if ($result=mysql_query($sql)) {
      while ($row=mysql_fetch_array($result)) {
        echo "".$row['bookname']." ";
        echo ' - ';
        
        echo "".$row['cost']." ";
echo " ".$row['qty']."<br>";
        //multiplay quantity and itemprice to get total of 1 product all together
        $totalCost += $row["qty"] * $row["cost"];
$totalCost2=$row["qty"] * $row["cost"];
      }
    }
    else {
      echo mysql_error();
    }
    echo "Total: ";
    //format of the totalcost 2 decimals and overall total
    echo number_format($totalCost, 2, ".", ",");
//$_SESSION['no']=$totalCost;
//$transactionno="1";
//$query7="select max(transactionno) as 'transactionno' from transactionmaster";
//$rs=mysql_query($query7);
//$row=mysql_fetch_row($rs);
//if($row)
//{
//echo $row[0];
//$transactionno=$row[0];
//}
echo $totalCost;
//echo $transactionno;
  // $queryup="update transactionmaster set amount=".$totalCost2." where transactionno=$transactionno";
//$res1=mysql_query($queryup) or die ("error"); 
}
?>