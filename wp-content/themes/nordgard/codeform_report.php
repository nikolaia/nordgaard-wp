<?php
// $con = mysql_connect("localhost","root","root"); DEV
$con = mysql_connect("localhost","nordgctu_cf","Codeform2000");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("nordgctu_wp822", $con);

$result = mysql_query("SELECT * FROM ngf_invitations");

$num_results = mysql_num_rows($result); 
if ($num_results == 0){ 
	echo "Noe gikk galt!";
}
else{ 
	echo "<table border='1'>
<tr>
<th>Name</th>
<th>Code</th>
<th>Response</th>
</tr>";
	while($row = mysql_fetch_array($result))
	  {
  		echo "<tr>";
  		echo "<td>" . $row['Name'] . "</td>";
  		echo "<td>" . $row['Code'] . "</td>";
  		echo "<td>" . $row['Response'] . "</td>";
  		echo "</tr>";
	  }
	echo "</table>";
} 

$result = mysql_query("SELECT * FROM ngf_paamelding");

$num_results = mysql_num_rows($result); 
if ($num_results == 0){ 
  echo "Noe gikk galt!";
}
else{ 
  echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Birthday</th>
<th>Email</th>
<th>Phone</th>
<th>Postarea</th>
<th>Refered</th>
<th>Relation</th>
</tr>";
  while($row = mysql_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['Firstname'] . "</td>";
      echo "<td>" . $row['Lastname'] . "</td>";
      echo "<td>" . $row['Birthday'] . "</td>";
      echo "<td>" . $row['Email'] . "</td>";
      echo "<td>" . $row['Phone'] . "</td>";
      echo "<td>" . $row['Postarea'] . "</td>";
      echo "<td>" . $row['Refered'] . "</td>";
      echo "<td>" . $row['Relation'] . "</td>";
      echo "</tr>";
    }
  echo "</table>";
} 

mysql_close($con);

?>