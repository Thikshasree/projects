<?php
session_start();
if($_SESSION['logged']==0)
{
	//header ("Location: http://127.0.0.1/jigsawnet/index.php");
	header("Location: /new/index.php");
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Scrapbook </title>
</head>
<style type="text/css">
p
{
background-color:#6C0;
}

a:hover,a:active
{
float:left;
background-color:#C93;
}

a:link,a:visited
{
display:block;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
}



h1{text-shadow:5px 5px 5px #903;}
table.new1
{
	width:60%;
	height:520px;
	border:3px solid #F90;
	background-color:#FFF;
	
}

div
{
	font-family:"Comic Sans MS", cursive;
	font-size:17px;
	float:left;
}

div.one
{
	width:200px;
	height:25px;
}

div.two
{
	width:220px;
	height:25px;
}
	
</style>
<body background="pics/b.jpg">
<center>
<tr>
	<img src="pics/one.jpg" width="100%" height="94"/>
</tr>
</center>
<!--font style="font-family:'Comic Sans MS', cursive" style="font-size:45px"-->

<!--table align="left">
<tr>
<td>
<image src="poo.jpg" width="200" height="200">
</image>
</td>
</tr>
</table-->
<table>
<table align="right">
<tr>

<td>
<a href="friends.php">
<div class="two">
     <center><font color="#FFFFFF"> Friends </font></center>
</div>
</a>
</td>

<td>
<a href="communities.php">
<div class="two">
     <center><font color="#FFFFFF"> Communities </font></center>
</div>
</a>
</td>


<td>
<a href="home.php">
<div class="two">
     <center><font color="#FFFFFF"> Home </font></center>
</div>
</a>
</td>

<td>
<a href="change_pass.php">
<div class="two">
     <center><font color="#FFFFFF"> Change password </font></center>
</div>
</a>
</td>

<td>
<a href="index.php">
<div class="two">
     <center><font color="#FFFFFF"> Log Off </font></center>
</div>
</a>
</td>

</tr>
</table>

<table>
<table align="left">
<tr>
<td>
<?php
	
	mysql_connect("localhost","puji","sai");
	mysql_select_db("test");
	$id=$_SESSION['id'];
$getpic=mysql_query("SELECT profile_pic FROM po_info where `lno`='$id'");
$row1=mysql_fetch_array($getpic);

echo"<image src='$row1[0]' width=\"200\" height=\"200\">";
?>

</td>
</tr>

<tr>
<td>
<a href="profile.php">
<div class="one">
     <center><font color="#FFFFFF"> Profile </font> </center>
</div>
</a>
</td>
</tr>
<tr>
<td>
<a href="scrapbook.php">
<div class="one">
    <center><font color="#FFFFFF"> Scrap Book </font> </center>
</div>
</a>
</td>
</tr>

<tr>

<td>
<a href="images.php">
<div class="one">
    <center><font color="#FFFFFF"> Images </font> </center>
</div>
</a>
</td>
</tr>

<td>
<a href="videos.php">
<div class="one">
    <center><font color="#FFFFFF"> Videos </font> </center>
</div>
</a>
</td>
</table>

<table align="right">
<tr>
<td align="right" valign="top">
<!--video src="video.avi" width="310" height="240" autoplay>
video
</video-->
</td>
</tr>
<tr>
<td align="right" valign="top">
<image src="adv.jpg" width="310" height="200"> </image>
</td>
</tr>
</table>


<table class="new1" align="left">
<tr>
  <td height="86"> <form method="post" action="send_msg.php"> <table>
    <tr align="left" valign="top">
      <td>receiver : </td>
      <td><input type="text" name="msg" /></td>
      </tr>
    <tr>
      <td>message : </td>
      <td><input type="text" size="80" name="receiver" /></td>
      </tr>
    <tr align="center">
      <td><input type="submit" size="20" value="send message" /></td>
      </tr>
    </table> </form> <caption> Sorry..! User deosn't exist..!! please re-send..!! </caption></td>
</tr>
<tr>
  <td height="21"><hr /></td>
</tr>
<tr>
  <td>
  <table>
  <tr align="center" valign="top">

  <?php
	$db_name="test";
	$table_name1="user_msg";
	$table_name2="messages";
	$userno="lno";
$connection = @mysql_connect("localhost", "puji", "sai") or die(mysql_error());
$db = @mysql_select_db($db_name, $connection) or die(mysql_error());
$id=$_SESSION['id'];
$sql="SELECT * FROM  `user_msg` WHERE  `lno` =  '$id' ORDER BY  `msg_no` DESC";
$result = @mysql_query($sql,$connection) or die(mysql_error());

while($row = mysql_fetch_array($result))
{
	$s_id=$row['sender'];
	$s_mess=$row['msg_no'];
	
	$sql1="select * from $table_name2 WHERE `msg_no` = '$s_mess'";
	$result1=@mysql_query($sql1,$connection) or die(mysql_error());
	$s_msg=$row['msg'];

	echo "<tr>";
	echo "<td width= '20%' >";
	echo "$s_id";
	echo "</td>";
	echo "<td width='30%'>";
	echo "$s_msg";
	echo "</td>";
	echo "</tr>";
}
?>
    
  <!--center> <strong> SCRAPBOOK :) </strong> </center-->
    
    
  <!--tr>  <td></td> <td></td>  </tr>
<tr>  <td></td> <td></td>  </tr-->
    
    
  </tr>
  </table>
  </td>
</tr>
</table>

</font>
<!--
<h1><center>  PROFILE  </center></h1> -->
<!--video src="PranavMistry_2009I.avi" width="320" height="240" autoplay>
video
</video-->

</body>
</html>