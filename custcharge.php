<?php
//connect to the database
mysql_connect("localhost","jumiuser","7b4q5JFE");
//use this database
mysql_select_db("jumi");

//get only the last updated row
$result = mysql_query("select * from GLPS_Cust_Charge where CCType=$jumi[0] order by LastUpdated DESC limit 1");

//print the Rate Value on the screen
$row = mysql_fetch_array( $result );
echo $row['CCValue'];

?>
