<?php
include("fm.php"); 
?>
<?php

date_default_timezone_set('America/Chicago');
 //CREATE TIMESTAMP VARIABLES
$current_ts  = time();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Visitor Details</title>

<script language="javascript">
function SetDate()
{
var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;


document.getElementById('bdate').value = today;


}

 function reg()
{
		
	if(document.registration.allotted.value=="")
	{
		alert("Please enter Units Consumed");
		document.registration.allotted.focus();
		document.registration.allotted.select();
		return false;
	}
	else if(document.registration.unit.value=="")
	{
		alert("Please enter Units Allottted");
		document.registration.unit.focus();
		document.registration.unit.select();
		return false;
	}
		else if(document.registration.extra.value=="")
	{
		alert("Please enter Exceeded Charge");
		document.registration.extra.focus();
		document.registration.extra.select();
		return false;
	}
	
	
	else
		{
		return true;
		}	
}
	</script>

</head>

<body bgcolor="blue" onload="SetDate();">
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
	<form id="f1" action="insertsvis.php" id="registration" name="registration" method="post" onSubmit="return reg()">
	<table width="600" height="200">
	<tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2">
	 
	Student Visitor Details  </td>
	  </tr>
	<tr>
	<td width="110">Student Visitor ID</td>
	<?php
	include("connection.php");
	if(!$con)
	{
	 die("Error:not connected".mysql_error());
	}
	if(mysql_select_db("svisitor",$con))
	{
	$Qry = mysql_query("SELECT ifnull(max(cid),0) as count FROM svis"); 
	while($count = mysql_fetch_array($Qry)) 
 	{
		 @$max = $count['count']+1;
	}

	}
	?>
	
	<td width="267"><input type="text" readonly="true" name="cid" id="cid" width="200" value='<?php echo $max; ?>'/></td>
	</tr>
	<tr>
          <td>Visited On</td>
<td><input name="bdate" type="text" id="bdate"  width="200" /></td>
            </tr>  
	
	
	<tr>
	  <td height="38">Student Details</td>
	  <td>
	  <textarea name="eid" id="eid" cols="45" rows="5"></textarea>
	  
	  </td>
	  </tr>
	
	
	<tr>
          <td>Name of visitor</td>
<td><input name="allotted" type="text" id="allotted"  width="200" /></td>
            </tr>  
	
	<tr>
          <td>Gender of Visitor</td>
<td>
<select name="unit" id="unit">
	    <option value="Male">Male</option>
	    <option value="Female">Female</option>
	    </select>	
</td>
            </tr>  
	
	
	
	
	<tr>
          <td>Reason of visit</td>
<td>
 <textarea name="extra" id="extra" cols="45" rows="5"></textarea>
</td>
            </tr>  
			
			
			<tr>
          <td>Other visitor details</td>
<td>
  <textarea name="ddate" id="ddate" cols="45" rows="5"></textarea>
</td>
            </tr>  
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" value="save" />&nbsp;<input type="reset" value="clear"/></td>
	  </tr>
	<tr>
	  <td align="center" bgcolor="#87CEFA" style="color:maroon" colspan="2" >
	  <?php if(@$_GET['status'])
	  {
	  	echo "Student Visitor details Added";
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
