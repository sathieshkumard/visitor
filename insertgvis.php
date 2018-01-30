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
$tin = $_REQUEST["tin"];
$tout= $_REQUEST["tout"];
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
	
  $query="insert into gvis values('".$cid."','".$bdate."','".$unit."','".$allotted."','".$extra."','".$ddate."','".$tin."','".$tout."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:visitor.php?status=visitor details added'); 
	
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