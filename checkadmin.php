<?php
include("fm.php"); 
?><?php
include("connection.php");
$name=$_REQUEST["username"];
$pd=$_REQUEST["password"];
session_start();
$utype=$_REQUEST["utype"];
$_SESSION["logid"] = $name;
if(!$con)
{
 die("Error: not connected".mysql_error());
}

if(mysql_select_db("svisitor",$con))
{
  if($utype=="Admin")
  {
	$query= "select * from reg where uname='".$name."' and pwd='".$pd."' and utype='Admin' ";
	echo $query;
	$execute=mysql_query($query,$con);

	if($result = mysql_fetch_array($execute))
	{
		header('Location:division.php'); 
	}
	else{
		header('Location:login.php?status=Invalid User'); 
		
	}
  }
	else
	{	
  		//if(isset($_SESSION["logid"]))
		//{
			
  			$query= "select * from extension where eid='".$name."' and mobile='".$pd."'";
  			echo $query;
  			$execute=mysql_query($query,$con);

  			if($result = mysql_fetch_array($execute))
  			{
   				header('Location:employee.php'); 
  			}
		//}
  			else
  			{
  				header('Location:login.php?status=Invalid User'); 
  			}	 
		
  	}
 }
else
{
die("Error:".mysql_error());
}

?>