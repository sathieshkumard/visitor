<?php
include("fm.php"); 
?><?php
include ("connection.php");
$sname=$_REQUEST["sname"];
$rno=$_REQUEST["rno"];
$sdoj=$_REQUEST["sdoj"];
$sgender=$_REQUEST["sgender"];
$smobile=$_REQUEST["smobile"];
$semail=$_REQUEST["semail"];
$vcost=$_REQUEST["vcost"];
$vtype=$_REQUEST["vtype"];
$vmanu=$_REQUEST["vmanu"];
$user_name=$_REQUEST["user_name"];



if(mysql_select_db("svisitor",$con))
{
	
  $query="insert into customer values('".$user_name."','".$rno."','".$sname."','".$sdoj."','".$sgender."','".$smobile."','".$semail."','".$vtype."','".$vmanu."','".$vcost."')";
  $execute=mysql_query($query,$con);
  
  if($execute)
  {
    header('Location:customer.php?status=Updated'); 
	
  }
  else
  {
  die("Error:".mysql_error());
  }
}
?>