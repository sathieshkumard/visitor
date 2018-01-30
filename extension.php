<?php
include("fm.php"); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Extension Details</title>

<script language="javascript">

 function reg()
{
		ml = document.registration.email.value;
		pos1 = ml.indexOf("@")
		pos = ml.indexOf(" ")
		pos2 = (pos1+1)
		server = ml.substring(pos2);
		server_pos = server.lastIndexOf(".")
		reqtype = server.substring(server_pos+1)
		type_end = reqtype.substring(reqtype.length-1)
		  var x = document.registration.mobile.value;
        if(isNaN(x)|| x.indexOf(" ")!=-1){
              alert("Enter numeric value in MobileNo");return false; }
        if (x.length > 10 ){
                alert("MobileNo Should not be greater than 10"); return false;
           }
		if (x.length < 10){
                alert("Enter only 10 numbers in MobileNo"); return false;
           }
	if(document.registration.ename.value=="")
	{
		alert("Please enter Employee name");
		document.registration.ename.focus();
		document.registration.ename.select();
		return false;
	}
	else if(document.registration.mobile.value=="")
	{
		alert("Please enter mobile number");
		document.registration.mobile.focus();
		document.registration.mobile.select();
		return false;
	}
	else if(ml == "")
	{
		document.registration.email.focus();
		document.registration.email.select();
		alert("Email cannot be blank");
		return false;                
	}


		else if(ml.indexOf("@")==-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("The Email Address must contain '@' sign");
			return false;  
		}
		else if(pos1<1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("Email address cannot start with '@' sign");
			return false;  
		}  
		else if(ml.indexOf(".")==-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("The Email Address must contain '.' sign");
			return false;  
		}
		else if(pos!=-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("The Email Address cannot contain spaces");
			return false;  
		}
		else if(server.indexOf("@")!=-1)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("A valid Email must contain only one '@' sign");
			return false;  
		} 
		else if(server.indexOf(".")==0)
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("There should some text between '@' and '.' sign");
			return false;  
		} 
		else if(reqtype=="")
		{  
			document.registration.email.focus();
			document.registration.email.select();
			alert("Email Id should end with character(like .com,.net,.org)");
			return false;  
		}
		else if(type_end.toUpperCase()<"A" || type_end.toUpperCase()>"Z")
		{
			document.registration.email.focus();
			document.registration.email.select();
			alert("Email Id should not end with number or symbol");
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
  <tr border="1" bordercolordark="#87CEFA">
   <td> <a href="division.php">Division </a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="department.php"> Department</a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="Channel.php"> Channel </a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="Extension.php"> Employee </a>
   &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="Charges.php"> Visitor </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="Dreports.php"> Employee Visitors Reports </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="EReports.php"> Employeewise Visitors </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="index.php"> Logout </a></td>
  </tr>
    <tr border="1" bordercolordark="#87CEFA">
   <td> <a href="divreport.php">Division Report </a>&nbsp;&nbsp;&nbsp; <a href="depreport.php"> Department Report </a>
   &nbsp;&nbsp;&nbsp;<a href="Chareport.php"> Channel Report </a>
   &nbsp;&nbsp;&nbsp;<a href="Extreport.php"> Employee Report </a>
      &nbsp;&nbsp;&nbsp;<a href="svisitor.php">Student Visitors </a>
	  &nbsp;&nbsp;&nbsp;<a href="svreport.php">Student Visitors Report </a>	
	   &nbsp;&nbsp;&nbsp;<a href="visitor.php">General Visitors </a>
     
   </td>
  </tr>
    <tr border="1" bordercolordark="#87CEFA">
   <td> 
     <a href="gvreport.php">General Visitors Report</a>
     &nbsp;&nbsp;&nbsp;<a href="dgreport.php">Datewise General Visitors </a> 
   </td>
  </tr>
  <tr>
    <td><div align="center" class="style1"></div></td>
  </tr>
  <tr>
    <td align="center">
	<form action="insertextension.php" id="registration" name="registration" method="post" onSubmit="return reg()" >
	<table width="400" height="200">
	<tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2">
	 
	 Employee Details  </td>
	  </tr>
	<tr>
	<td width="110">Employee ID</td>
	<?php
	include("connection.php");
	if(!$con)
	{
	 die("Error:not connected".mysql_error());
	}
	if(mysql_select_db("svisitor",$con))
	{
	$Qry = mysql_query("SELECT ifnull(max(eid),0) as count FROM extension"); 
	while($count = mysql_fetch_array($Qry)) 
 	{
		 @$max = $count['count']+1;
	}

	}
	?>
	
	<td width="267"><input type="text" readonly="true" name="eid" id="eid" width="200" value='<?php echo $max; ?>'/></td>
	</tr>
	<tr>
          <td>Employee Name</td>
<td><input name="ename" type="text" id="ename"  width="200" /></td>
            </tr>  
	<tr>
          <td>Designation</td>
<td><select name="edesig" id="edesig">
	     <option value="Application">Application</option>
		  <option value="Networking">Networking</option>
		 <option value="Web Development">Web Development</option>
	    <option value="Testing">Testing</option>
	    </select>			</td>
            </tr>  
	
	
	<tr>
	  <td height="38">Division</td>
	  <td><label>
	    <select name="division" id="division">
		
		<?php 
include("connection.php");

if($con)
{
}
else
{
 die("Error:not connected".mysql_error());
}
if(mysql_select_db("svisitor",$con))
	{
	$Qry = mysql_query("SELECT distinct dname  FROM division"); 
	while($count = mysql_fetch_array($Qry)) 
 	{?>
		<option value="<?php echo $count['dname']; ?> "><?php echo $count['dname']; ?></option> 
	<?php }

	}

?>
	      </select>
	  </label></td>
	  </tr>
	
	
	<tr>
	  <td height="38">Department</td>
	  <td><label>
	    <select name="department" id="department">
		
		<?php 
include("connection.php");

if($con)
{
}
else
{
 die("Error:not connected".mysql_error());
}
if(mysql_select_db("svisitor",$con))
	{
	$Qry = mysql_query("SELECT distinct dname  FROM department"); 
	while($count = mysql_fetch_array($Qry)) 
 	{?>
		<option value="<?php echo $count['dname']; ?> "><?php echo $count['dname']; ?></option> 
	<?php }

	}

?>
	      </select>
	  </label></td>
	  </tr>
	
	<tr>
	  <td height="38">Channel</td>
	  <td><label>
	    <select name="channel" id="channel">
		
		<?php 
include("connection.php");

if($con)
{
}
else
{
 die("Error:not connected".mysql_error());
}
if(mysql_select_db("svisitor",$con))
	{
	$Qry = mysql_query("SELECT distinct cname  FROM channel"); 
	while($count = mysql_fetch_array($Qry)) 
 	{?>
		<option value="<?php echo $count['cname']; ?> "><?php echo $count['cname']; ?></option> 
	<?php }

	}

?>
	      </select>
	  </label></td>
	  </tr>
	
	<tr>
          <td>Mobile No.</td>
<td><input name="mobile" type="text" id="mobile"  width="200" /></td>
            </tr>  
	
	
	<tr>
          <td>Email ID</td>
<td><input name="email" type="text" id="email"  width="200" /></td>
            </tr>  
	
	
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" value="save" />&nbsp;<input type="reset" value="clear"/></td>
	  </tr>
	<tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2" >
	  <?php if(@$_GET['status'])
	  {
	  	echo "Employee details Added";
	  }?>&nbsp;</td>
	  </tr>
	</table>
	</form>
		<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	</td>
  </tr>
</table>
</body>
</html>
