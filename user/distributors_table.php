<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="styles.css">

</head>
<body>

<div align="left">

<table >

<tr> <th> NAME </th> <th> COMPANY ID </th> <th> FOUNDED </th>  </tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM distributors";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
	$myDistributor = $row['name'];
	$id = $row['id'];
	$founded = $row['founded'];


	echo "<tr>" . "<th>" . $myDistributor . "</th>" . "<th>" . $id. "</th>" . "<th>" . $founded. "</th>" . "</tr>";
}

?>

</table>

</div>

</body>
</html>