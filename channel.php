<?php
include("fm.php"); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Channel Details</title>
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
	<form id="f1" action="insertchannel.php" >
	<table width="400" height="200">
	<tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2">
	 
	 Channel Details  </td>
	  </tr>
	<tr>
	<td width="110">Channel ID</td>
	<?php
	include("connection.php");
	if(!$con)
	{
	 die("Error:not connected".mysql_error());
	}
	if(mysql_select_db("svisitor",$con))
	{
	$Qry = mysql_query("SELECT ifnull(max(cid),0) as count FROM channel"); 
	while($count = mysql_fetch_array($Qry)) 
 	{
		 @$max = $count['count']+1;
	}

	}
	?>
	
	<td width="267"><input type="text" readonly="true" name="cid" id="cid" width="200" value='<?php echo $max; ?>'/></td>
	</tr>
	<tr>
          <td>Channel Name</td>
<td><input name="cname" type="text" id="cname"  width="200" /></td>
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
          <td>Number of Employees</td>
<td><input name="noe" type="text" id="noe"  width="200" /></td>
            </tr>  
	
	
	
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" value="save" />&nbsp;<input type="reset" value="clear"/></td>
	  </tr>
	<tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2" >
	  <?php if(@$_GET['status'])
	  {
	  	echo "Channel details Added";
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
