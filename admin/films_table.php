<!DOCTYPE html>
<html>
	<head>

		<link rel="stylesheet" href="styles.css">

	</head>
	<body>

		<div align="left">

		<table >

			<tr> <th> NAME </th> <th> YEAR </th> <th> RATING </th> <th> GENRE </th> </tr> 

			<?php

				include "config.php";

				$sql_statement = "SELECT * FROM films";

				$result = mysqli_query($db, $sql_statement);

				while($row = mysqli_fetch_assoc($result))
				{
					$myFilm = $row['name'];
					$year = $row['year'];
					$rating = $row['rating'];
					$genre = $row['genre'];


					echo "<tr>" . "<th>" . $myFilm . "</th>" . "<th>" . $year. "</th>" . "<th>" . $rating. "</th>" . "<th>" . $genre. "</th>" . "</tr>";
			}

			?>

		</table>

		</div>

	</body>
</html>