<?php

//$con = mysql_connect("localhost","root","root"); //DEV
$con = mysql_connect("localhost","nordgctu_cf","Codeform2000"); //Production

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("nordgctu_wp822", $con); //wordpress

// Check that the registration ain't full

$result = mysql_query("select count(1) FROM ngf_paamelding");
$row = mysql_fetch_array($result);

$total = 150 - $row[0];

echo $total;

mysql_close($con);

?>