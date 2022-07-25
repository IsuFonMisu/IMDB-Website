<html>
	<table>

	<tr> <th> SSN </th> <th> NAME </th> <th> AGE </th> <th> GENDER </th> <th> STARTED </th> <th>RETIRED</th> </tr> 

		<?php

		include "config.php";

		$sql_statement = "SELECT * FROM actors";

		$result = mysqli_query($db, $sql_statement);

		while($row = mysqli_fetch_assoc($result))
		{
			$ssn = $row['ssn'];
			$myActor = $row['name'];
			$age = $row['age'];
			$gender = $row['gender'];
			$started = $row['started'];
			$retired = $row['retired'];


			echo "<tr>" . "<th>" . $ssn . "</th>" . "<th>" . $myActor . "</th>" . "<th>" . $age. "</th>" . "<th>" . $gender. "</th>" . "<th>" . $started. "</th>" . "<th>" . $retired. "</th>" . "</tr>";
		}

		?>

	</table>

</html>