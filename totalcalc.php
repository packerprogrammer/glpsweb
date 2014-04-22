<?php


//connect to the database
mysql_connect("localhost","root","tooltool2");
//use this database
mysql_select_db("db_glpsweb");

//get only the last updated row
$result = mysql_query("select * from GLPS_Rates where RateType=$jumi[0] order by LastUpdated DESC limit 1");

//print the Rate Value on the screen
$row = mysql_fetch_array( $result );
$ratecharge = ($row['RateValue'] / 100) * $jumi[1];

//get only the last updated row
$result = mysql_query("select * from GLPS_Cust_Charge where CCType=$jumi[0] order by LastUpdated DESC limit 1");

$row = mysql_fetch_array( $result );
$custcharge = $row['CCValue'];
$total = number_format($ratecharge+$custcharge, 2, '.','');
echo $total;

?>

