<?php


//connect to the database
mysql_connect("localhost","root","tooltool2");
//use this database
mysql_select_db("db_glpsweb");

//get only the last updated row
$result = mysql_query("select * from GLPS_Cust_Charge where CCType=$jumi[0] order by LastUpdated DESC limit 1");

//print the Rate Value on the screen
$row = mysql_fetch_array( $result );
$charge = ($row['CCValue']) * $jumi[1];
echo number_format($charge, 2, '.','');

?>

