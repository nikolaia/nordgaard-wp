<?php
// $con = mysql_connect("localhost","root","root"); DEV
$con = mysql_connect("localhost","nordgctu_cf","Codeform2000");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("nordgctu_wp822", $con);

$sql="UPDATE ngf_invitations SET Response = '$_POST[response]' WHERE Code ='$_POST[code]'";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}

$result = mysql_query("SELECT * FROM ngf_invitations WHERE Code = '$_POST[code]'");

$num_results = mysql_num_rows($result); 
if ($num_results == 0){ 
	echo "Noe gikk galt! Har du skrevet koden rett?";
}
else{ 
	while($row = mysql_fetch_array($result))
	  {
	  	$attending = "kommer ikke :(";
	 	if ($row['Response'] == 1) $attending = "kommer!!! :D";
	  	echo "Koden " . $row['Code'] . " er satt til " . $attending;
	  	echo "<br />";
	  }
} 

mysql_close($con);

?>