<?php

//$con = mysql_connect("localhost","root","root"); //DEV
$con = mysql_connect("localhost","nordgctu_cf","Codeform2000"); //Production

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("wordpress", $con); //nordgctu_wp822

// Check that the registration ain't full

$result = mysql_query("select count(1) FROM ngf_paamelding");
$row = mysql_fetch_array($result);

$total = $row[0];

if ($total >= 150) {
	mysql_close($con);
	echo "Det er ikke flere festivalplasser ledig!";die(1);
}

// Yaaay there is room in the festival!!! Let's just check that every field has valid info

if(empty($_POST[acceptTerms])) {
	mysql_close($con);
	echo "Du må godta vilkårene!";die(2);
}

$Firstname = $_POST[Firstname];
$Lastname = $_POST[Lastname];
$Birthdate = $_POST[Birthday];
$Email = $_POST[Email];
$Phone = $_POST[Phone];
$Postarea = $_POST[Postarea];
$Refered = $_POST[Refered];
$Relation = $_POST[Relation];

if (!filter_var($Email, FILTER_VALIDATE_EMAIL) 
		|| empty($Firstname)
		|| empty($Lastname)
		|| empty($Birthdate)
		|| empty($Phone)
		|| empty($Postarea))
	{
	mysql_close($con);
	echo "Du mangler et felt, eller har skrevet en ugyldig e-post!";die(2);
}

// THEY ARE OKAY!! Let's insert!

$sql = "INSERT INTO ngf_paamelding(Firstname, Lastname, Birthdate, Email, Phone, Postarea, Refered, Relation) 
VALUES ('$Firstname', '$Lastname', '$Birthdate', '$Email', '$Phone', '$Postarea', '$Refered', '$Relation')";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}

mysql_close($con);
echo "Du er nå påmeldt festivalen ".$Firstname."! Sees dær!";
die(0);

?>