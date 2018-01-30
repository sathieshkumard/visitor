<?php
include("fm.php"); 
?><?php 
include("connection.php");
$eid = $_REQUEST["eid"];
$ename = $_REQUEST["ename"];
$edesig = $_REQUEST["edesig"];
$division = $_REQUEST["division"];
$department = $_REQUEST["department"];
$channel = $_REQUEST["channel"];
$mobile = $_REQUEST["mobile"];
$email = $_REQUEST["email"];
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
	
  $query="insert into extension values('".$eid."','".$ename."','".$edesig."','".$division."','".$department."','".$channel."','".$mobile."','".$email."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:extension.php?status=Updated'); 
	
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