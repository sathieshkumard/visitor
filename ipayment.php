<?php
include("fm.php"); 
?><?php 
include("connection.php");
$pid = $_REQUEST["pid"];
$cid = $_REQUEST["cid"];
$unit = $_REQUEST["unit"];
$allotted = $_REQUEST["allotted"];
$extra = $_REQUEST["extra"];
$eid = $_REQUEST["eid"];
$ddate = $_REQUEST["ddate"];
$pdate = $_REQUEST["pdate"];
if($con)
{
 echo "Connected";
}
else
{
 die("Error:not connected".mysql_error());
}

if(mysql_select_db("svisitor",$con))
{
	
  $query="insert into payment values('".$pid."','".$cid."','".$unit."','".$allotted."','".$extra."','".$eid."','".$ddate."','".$pdate."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:employee.php?status=Updated'); 
	
  }
  else
  {
  die("Error:".mysql_error());
  }
  
}
else
{
die("Error:".mysql_error());
}

?>