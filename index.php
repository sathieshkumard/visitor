<?php
include("fm.php"); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Visitor Portal Management</title>
<script language="javascript">

 function reg()
{
		
	if(document.registration.username.value=="")
	{
		alert("Please enter User name");
		document.registration.username.focus();
		document.registration.username.select();
		return false;
	}
	if(document.registration.password.value=="")
	{
		alert("Please enter Password");
		document.registration.password.focus();
		document.registration.password.select();
		return false;
	}
		
	
	
	else
		{
		return true;
		}	
}
	</script>


<style type="text/css">
<!--
.style1 {
	color: #87CEFA;
	font-weight: bold;
	font-size: x-large;
}
-->
</style>


</head>
<body bgcolor="blue">
<table border="0" align="center" bgcolor="#87CEFA" height="200">
  <tr>
    <td height="10"><p><img src="images/4.jpg" width="100%" /></p>    </td>
  </tr>
    
    
    <tr>
      <td align="center">
        <div align="center">
		<form id="registration" name="registration" method="post" onSubmit="return reg()" action="checkadmin.php">
          <table width="400" cellpadding="5" cellspacing="4">
            <tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2">
	 
	  User Login </td>
	  </tr>
            <tr>
              <td width="110">User name</td>
	      <td width="267"><input name="username" type="text" id="username"  width="200" /></td>
	      </tr>
            <tr>
              <td>Password</td>
	        <td><input name="password" type="password" id="password" width="200" /></td>
	        </tr>
            <tr>
		<tr>
              <td width="110">User type</td>
	      <td><select name="utype" id="utype">
            <option value="Admin">Admin</option>
            <option value="Employee">Employee</option>
	      </tr>
              <td>&nbsp;</td>
	          <td><input name="submit" type="submit" onclick="validate();" value="Login" />
<input name="reset" type="reset" value="clear" /></td>
            </tr>
           
            <tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2" >
	 
	 
	  <?php if(@$_GET['status'])
	  { 
	  	echo $_GET['status'];
	  }?></td>
	  </tr>
          </table>
		  </form>
	    </div>
	  <p align="center">&nbsp;</p>
	  <p align="center">&nbsp;</p>
	  <p align="center">&nbsp;</p>
	  <p align="center">&nbsp;</p>
	  <p align="center">&nbsp;</p>
	  <p align="center">&nbsp;</p>
	  <p align="center">&nbsp;	  </p>
	  <p align="center">      </p></td>
    </tr>
  </table>
</div>
</body>
</html>
