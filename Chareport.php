<?php
include("fm.php"); 
?><?php

date_default_timezone_set('America/Chicago');
 //CREATE TIMESTAMP VARIABLES
$current_ts  = time();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Channel Report</title>
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


document.getElementById('pdate').value = today;


}

</script>

<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: x-large;
}
-->
</style>

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
    <td align="center">

      <table width="389" cellpadding="5" cellspacing="5">
       <tr>
    <td align="center">		  
		  <?php
				include('db.php');
				if(isset($_POST['filter']))
				{
					$filter = $_POST['filter'];
					$result = mysql_query("SELECT * FROM channel");
				}
				else
				{
					$result = mysql_query("SELECT * FROM channel");
				}
				echo'<table align="center" border=1 width="50%">
				<th>Channel ID</th><th>Channel Name</th><th>Division</th><th>Department</th><th>No of Employees</th>';
				while($row=mysql_fetch_assoc($result))
				{
					echo '<tr>
							<td>'.$row['cid'].'</td>
							<td>'.$row['cname'].'</td>
							<td>'.$row['division'].'</td>
							<td>'.$row['department'].'</td>
							<td>'.$row['noe'].'</td>
							
						</tr>';
				}
				echo '</table>';
				
				?>
	</td>
</tr>
      </table>
   
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
