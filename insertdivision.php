<?php
include("fm.php"); 
?><?php 
include("connection.php");
$did = $_REQUEST["did"];
$dname = $_REQUEST["dname"];
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
	
  $query="insert into division values('".$did."','".$dname."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:division.php?status=Updated'); 
	
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