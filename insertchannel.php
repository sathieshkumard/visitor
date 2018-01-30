<?php
include("fm.php"); 
?><?php 
include("connection.php");
$cid = $_REQUEST["cid"];
$cname = $_REQUEST["cname"];
$division = $_REQUEST["division"];
$department = $_REQUEST["department"];
$noe = $_REQUEST["noe"];
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
	
  $query="insert into channel values('".$cid."','".$cname."','".$division."','".$department."','".$noe."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:channel.php?status=Updated'); 
	
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