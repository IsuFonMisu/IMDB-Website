<!DOCTYPE html>
<html>
<head>
	<title>Actors</title>

	<link rel="stylesheet" href="styles.css">

</head>
<body>

<div align="center">

	<table>

<tr> <th> SSN </th> <th> NAME </th> <th> AGE </th> <th> GENDER </th> <th> STARTED </th> <th>RETIRED</th> </tr> 

<?php

include "config.php";


if (isset($_POST['gender'])){

		$gender = $_POST['gender'];
		$ageL = $_POST['ageL'];
		$ageU = $_POST['ageU'];
		$isretired = $_POST['is_retired'];

	$sql_statement = "SELECT * FROM actors WHERE age > $ageL AND age <$ageU";  

	if ($gender != 'N'){
		$sql_statement = $sql_statement . " AND gender = ". "'$gender'" ; 	
	}

	if($isretired == 'y'){

		$sql_statement = $sql_statement . " AND retired != 0000-00-00 ";

	}

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


}

else
{

	echo "The form is not set.";

}

?>

</table>
</div>

</body>
</html>