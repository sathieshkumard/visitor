<?php
include("fm.php"); 
?><?php 
include("connection.php");
$cid = $_REQUEST["cid"];
$bdate = $_REQUEST["bdate"];
$eid = $_REQUEST["eid"];
$unit = $_REQUEST["unit"];
$allotted = $_REQUEST["allotted"];
$extra = $_REQUEST["extra"];
$ddate = $_REQUEST["ddate"];
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
	
  $query="insert into charge values('".$cid."','".$bdate."','".$eid."','".$unit."','".$allotted."','".$extra."','".$ddate."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:charges.php?status=Updated'); 
	
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