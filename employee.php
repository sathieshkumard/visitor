<?php
include("fm.php"); 
?><?php

date_default_timezone_set('America/Chicago');
 //CREATE TIMESTAMP VARIABLES
$current_ts  = time();
session_start();
$eid=$_SESSION["logid"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View your Visitors</title>
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
    <td>
<a href="index.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="employee.php">Your Visitors</a>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
<form action="" method="post" name="frm_login" id="frm_login" enctype="multipart/form-data">
          <table width="100%" border=0 align="center">
                  <tr >
                    <th colspan="5" id="formhedear">Your Visitors</th>
                  </tr>
				
            <tr>
          <th scope="col"><strong>Welcome Employee With Employee ID:  <?php echo $_SESSION["logid"]; ?></strong></th>
          </tr> 
		
              </table>
        </form>
      </div>
      </div>

      <table width="689" cellpadding="5" cellspacing="5">
       <tr>
    <td align="center">		  
		  <?php
				include('db.php');
				if(isset($_POST['filter']))
				{
					$filter = $_POST['filter'];
					$result = mysql_query("SELECT * FROM charge WHERE eid= '$eid'");
				}
				else
				{
					$result = mysql_query("SELECT * FROM charge WHERE eid= '$eid'");
				}
				echo'<table align="center" border=1 width="100%">
				<th>Visitor Name</th><th>Gender of Visitor</th><th>Reason for Visit</th><th>Visitor Information</th><th>Visited Date</th>';
				while($row=mysql_fetch_assoc($result))
				{
					echo '<tr>
							
							<td>'.$row['allotted'].'</td>
							<td>'.$row['unit'].'</td>
							<td>'.$row['extra'].'</td>
							<td>'.$row['ddate'].'</td>
							<td>'.$row['bdate'].'</td>
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
