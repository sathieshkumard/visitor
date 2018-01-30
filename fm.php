<?php


//SET THE TIME ZONE
date_default_timezone_set('America/Chicago');
 
//CREATE TIMESTAMP VARIABLES
$current_ts  = time();
//month,year
$deadline_ts = mktime(0,0,0,5,5,2018);
 
//IF THE DEADLINE HAS PASSED, LET USER KNOW...ELSE, DISPLAY THE REGISTRATION FORM
if($current_ts > $deadline_ts) {
     
header("Location: fmp.php");

} 


?>