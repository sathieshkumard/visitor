<?php
include("fm.php"); 
?><?php 
include("connection.php");
$did = $_REQUEST["did"];
$dname = $_REQUEST["dname"];
$division = $_REQUEST["division"];
$noc = $_REQUEST["noc"];
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
	
  $query="insert into department values('".$did."','".$dname."','".$division."','".$noc."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:department.php?status=Updated'); 
	
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