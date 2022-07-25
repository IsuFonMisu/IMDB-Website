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

	header ("Location: admin_actors.php");
}

else if (isset($_POST['director_name'])){

	$name = $_POST['director_name'];
	$ssn = $_POST['ssn'];
	$started = $_POST['started'];
	$retired = $_POST['retired'];


	$sql_statement = "INSERT INTO directors(ssn, name, started, retired)
						VALUES ($ssn,'$name' ,'$started', '$retired')";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_directors.php");
}

else if (isset($_POST['writer_name'])){

	$name = $_POST['writer_name'];
	$ssn = $_POST['ssn'];
	$started = $_POST['started'];
	$retired = $_POST['retired'];


	$sql_statement = "INSERT INTO writers(ssn, name, started, retired)
						VALUES ($ssn,'$name' ,'$started', '$retired')";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_writers.php");
}

else if (isset($_POST['producer_name'])){

	$name = $_POST['producer_name'];
	$ssn = $_POST['ssn'];
	$started = $_POST['started'];
	$retired = $_POST['retired'];


	$sql_statement = "INSERT INTO producers(ssn, name, started, retired)
						VALUES ($ssn,'$name' ,'$started', '$retired')";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_producers.php");
}

else if (isset($_POST['casting_director'])){

	$name = $_POST['casting_director'];
	$ssn = $_POST['ssn'];
	$started = $_POST['started'];
	$retired = $_POST['retired'];


	$sql_statement = "INSERT INTO casting_directors(ssn, name, started, retired)
						VALUES ($ssn,'$name' ,'$started', '$retired')";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_casting_directors.php");
}


else if (isset($_POST['film_name'])){

	$name = $_POST['film_name'];
	$key = $_POST['key'];
	$year = $_POST['year'];
	$genre = $_POST['genre'];
	$rating = $_POST['rating'];


	$sql_statement = "INSERT INTO films(`key`, name, genre, rating, year)
						VALUES ($key,'$name', '$genre', $rating, $year )";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_films.php");
}
else if (isset($_POST['how_many'])){

	$myAudience = $_POST['id'];
	$how_many = $_POST['how_many'];
	$from_where = $_POST['from_where'];


	$sql_statement = "INSERT INTO audience(id, how_many, from_where)
						VALUES ($myAudience,$how_many, '$from_where')";

	$result = mysqli_query($db, $sql_statement);


	header ("Location: admin_audience.php");
}
else if (isset($_POST['distributor_name'])){

	$myDistributor= $_POST['id'];
	$name= $_POST['distributor_name'];
	$founded = $_POST['date'];


	$sql_statement = "INSERT INTO distributors(id, name, founded)
						VALUES ($myDistributor,'$name', $founded)";

	$result = mysqli_query($db, $sql_statement);

	echo $sql_statement; 
	header ("Location: admin_distributors.php");
}

else
{

	echo "The form is not set.";

}


?>