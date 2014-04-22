<?php

$Rate1=$jumi[0];
$Consumption1=$jumi[1];
$Rate2=$jumi[2];
$Consumption2=$jumi[3];
$DemandRate=$jumi[4];
$DemandConsumption=$jumi[5];
$CustChargeType=$jumi[6];

//connect to the database
mysql_connect("localhost","root","tooltool2");
//use this database
mysql_select_db("db_glpsweb");

//get only the last updated row
$result = mysql_query("select * from GLPS_Rates where RateType=$Rate1 order by LastUpdated DESC limit 1");
$row = mysql_fetch_array( $result );
$RateCharge1 = ($row['RateValue'] / 100) * $Consumption1;

$result = mysql_query("select * from GLPS_Rates where RateType=$Rate2 order by LastUpdated DESC limit 1");
$row = mysql_fetch_array( $result );
$RateCharge2 = ($row['RateValue'] / 100) * $Consumption2;

$result = mysql_query("select * from GLPS_Cust_Charge where CCType=$DemandRate order by LastUpdated DESC limit 1");
$row = mysql_fetch_array( $result );
$DemandCharge = ($row['CCValue']) * $DemandConsumption;

$result = mysql_query("select * from GLPS_Cust_Charge where CCType=$CustChargeType order by LastUpdated DESC limit 1");
$row = mysql_fetch_array( $result );
$CustCharge = $row['CCValue'];


$total = number_format($RateCharge1+$RateCharge2+$DemandCharge+$CustCharge, 2, '.','');
echo $total;

?>

