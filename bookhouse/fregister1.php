<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<style>
html{
	font-family:Garamond;
}
h2{
	color:deepSkyBlue;
}
</style>
</head>
<body>
<br />
<br />
<h2>Register</h2>
<?php 
	if($_POST['Submit']=="Submit")
    {
    	$errmsg="";
        if(empty($_POST['licensekey']))
        {
        	$errmsg.="Enter License Key";
        }
        else{
        	$varlicense= $_POST['licensekey'];
        }
        if(empty($_POST['emailid']))
        {
        	$errmsg.="Enter email id";
        }
        else{
        	$varemail= $_POST['emailid'];
        }
        if(empty($_POST['firstname']))
        {
        	$errmsg.="Enter First Name";
        }
        else{
        	$varfname= $_POST['firstname'];
        }
        if(empty($_POST['lastname']))
        {
        	$errmsg.="Enter Last Name";
        }
        else{
        	$varlname= $_POST['lastname'];
        }
        if(empty($_POST['department']))
        {
        	$errmsg.="Enter Department";
        }
        else{
        	$vardep= $_POST['department'];
        }
        if(empty($_POST['designation']))
        {
        	$errmsg.="Enter Designation";
        }
        else{
        	$vardes= $_POST['designation'];
        }
        if(empty($_POST['city']))
        {
        	$errmsg.="Enter City";
        }
        else{
        	$varcity= $_POST['city'];
        }
        if(empty($_POST['telephone']))
        {
        	$errmsg.="Enter Telephone number";
        }
        else{
        	$vartel= $_POST['telephone'];
        }
	}
?>
<form action="register-validation.php" method="post">
	License Key:&nbsp;<input type="text" name="licensekey" value="" size="25" maxlength="50"/>		
    
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
    Email Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="emailid" value="" size="25" maxlength="50"/><br /> <br />
    
	First Name:&nbsp;&nbsp;<input type="text" name="firstname" value="" size="25" maxlength="50"/>
    
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
	Last Name:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lastname" value="" size="25" maxlength="25" /><br /><br />
    
	Department:&nbsp;<input type="text" name="department" value="" size="25" maxlength="30"/>
    
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	
	Designation:&nbsp;&nbsp;<input type="text" name="designation" value="" size="25" maxlength="30" /><br /><br />
    
	City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</Label><input type="text" name="city" value="" size="25" maxlength="25"/>
    
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
	Telephone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="telephone" value="" size="15" maxlength="20" /><br /><br />    
    
	<input type='submit' name='Submit' value='Submit' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
	<input type="reset" name="Reset" value="Reset" />

</form>
</body>
</html>
</body>
</html>
