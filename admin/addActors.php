<?php

include "config.php";

if (isset($_POST['name'])){

	$actor = $_POST['name'];
	$age = $_POST['age'];
	$ssn = $_POST['ssn'];
	$started = $_POST['started'];
	$retired = $_POST['retired'];
	$gender = $_POST['gender'];

	$sql_statement = "INSERT INTO actors(ssn, name,age, gender, started, retired)
						VALUES ($ssn,'$actor',$age, '$gender' ,'$started', '$retired')";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: index.php");
}

else
{

	echo "The form is not set.";

}


?>