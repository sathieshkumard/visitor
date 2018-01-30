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
<title>Datewise Visitor Report</title>
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
<form action="" method="post" name="frm_login" id="frm_login" enctype="multipart/form-data">
          <table width="100%" border=0 align="center">
                  <tr >
                    <th colspan="5" id="formhedear">Date wise Visitor Report</th>
                  </tr>
                 
                  <tr>
                    <td width="245" height="37"><div align="right"><strong><font color="#FF0000"></font>Date of Visit : </strong></div></td>
                    <td>
<label>
            <select name="bdate" id="bdate">
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
	$Qry = mysql_query("SELECT bdate FROM gvis"); 
	while($count = mysql_fetch_array($Qry)) 
 	{?>
              <option value="<?php echo $count['bdate']; ?> "><?php echo $count['bdate']; ?></option>
              <?php }

	}

?>
            </select>
          </label>

</td>
                  </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Display" Onclick="return done(this.form);hidediv();" />
                 &nbsp;&nbsp;&nbsp;
                 </td>
              </tr>
		
              </table>
        </form>
      </div>
      </div>

 <?php
   if($_POST['submitMain'])
   {
    $bdate=$_POST['bdate'];
    $get= @mysql_query("SELECT * FROM gvis WHERE bdate= '$bdate' ")or die(mysql_error());
    $num = @mysql_num_rows($get);
    for($i=0;$i<$num;$i++)
    {
     $cid= @mysql_result($get,$i,'cid');
     $unit= @mysql_result($get,$i,'unit');
     $allotted= @mysql_result($get,$i,'allotted');
     $extra= @mysql_result($get,$i,'extra');
	 $eid= @mysql_result($get,$i,'eid');
	 $ddate= @mysql_result($get,$i,'ddate');
    }
   }
 ?>

      <table width="889" cellpadding="5" cellspacing="5">
       <tr>
    <td align="center">		  
		  <?php
				include('db.php');
				if(isset($_POST['filter']))
				{
					$filter = $_POST['filter'];
					$result = mysql_query("SELECT * FROM gvis WHERE bdate='$bdate'");
				}
				else
				{
					$result = mysql_query("SELECT * FROM gvis WHERE bdate='$bdate'");
				}
				echo'<table align="center" border=1 width="100%">
				<th>Visitor Name</th><th>Gender of Visitor</th><th>Reason for Visit</th><th>Visitor Information</th><th>Time In</th><th>Time out</th>';
				while($row=mysql_fetch_assoc($result))
				{
					echo '<tr>
							
							<td>'.$row['allotted'].'</td>
							<td>'.$row['unit'].'</td>
							<td>'.$row['extra'].'</td>
							<td>'.$row['ddate'].'</td>
									<td>'.$row['tin'].'</td>
							<td>'.$row['tout'].'</td>
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
