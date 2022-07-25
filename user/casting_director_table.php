<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="styles.css">

</head>
<body>

<div align="left">

<table >

<tr> <th> NAME </th> <th> STARTED </th> <th> RETIRED </th> <th> SSN </th> </tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM casting_directors";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
	$myCasting_director = $row['name'];
	$retired = $row['retired'];
	$started = $row['started'];
	$ssn = $row['ssn'];


	echo "<tr>" . "<th>" . $myCasting_director . "</th>". "<th>" . $started. "</th>"  . "<th>" . $retired. "</th>" . "<th>" . $ssn. "</th>" . "</tr>";
}

?>

</table>

</div>

</body>
</html>