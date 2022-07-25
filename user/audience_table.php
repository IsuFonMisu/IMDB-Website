<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="styles.css">

</head>
<body>

<div align="left">

<table >

<tr> <th> ID </th> <th> How Many </th> </tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM films";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
	$myAudience = $row['id'];
	$how_many = $row['how_many'];


	echo "<tr>" . "<th>" . $myAudience . "</th>" . "<th>" . $how_many. "</th>" . "</tr>";
}

?>

</table>

</div>

</body>
</html>