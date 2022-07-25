<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="styles.css">

</head>
<body>

<div align="left">

<table >

<tr> <th> ID </th> <th> How Many </th> <th> From Where </th> </tr> 

<?php

include "config.php";

$sql_statement = "SELECT * FROM audience";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
	$myAudience = $row['id'];
	$how_many = $row['how_many'];
	$from_where = $row['from_where'];


	echo "<tr>" . "<th>" . $myAudience . "</th>" . "<th>" . $how_many. "</th>" ."<th>" . $from_where. "</th>". "</tr>";
}

?>

</table>

</div>

</body>
</html>