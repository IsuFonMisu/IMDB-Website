<?php

include "config.php";

if (isset($_POST['director'])){

	$key = $_POST['key'];
	$ssn = $_POST['director'];

	$sql_statement = "INSERT INTO directs (ssn, `key`)
						VALUES ($ssn, $key)";
	

	$result = mysqli_query($db, $sql_statement);

	header ("Location: r_directs.php");
}

else if (isset($_POST['role'])){

	$key = $_POST['key'];
	$ssn = $_POST['ssn'];
	$role = $_POST['role'];

	$sql_statement = "INSERT INTO plays (ssn, `key`, role)
						VALUES ($ssn, $key, '$role')";
	

	$result = mysqli_query($db, $sql_statement);

	header ("Location: r_plays.php");
}

else if (isset($_POST['producer'])){

	$key = $_POST['key'];
	$ssn = $_POST['producer'];
	$amount = $_POST['amount'];

	$sql_statement = "INSERT INTO funds (ssn, `key`, amount)
						VALUES ($ssn, $key, $amount)";
	

	$result = mysqli_query($db, $sql_statement);

	header ("Location: r_funds.php");
}

else if (isset($_POST['writer'])){

	$key = $_POST['key'];
	$ssn = $_POST['writer'];
	$year = $_POST['year'];

	$sql_statement = "INSERT INTO writes (ssn, `key`, year)
						VALUES ($ssn, $key, $year)";
	

	$result = mysqli_query($db, $sql_statement);

	header ("Location: r_writes.php");
}

else if (isset($_POST['distributor'])){

	$key = $_POST['key'];
	$id = $_POST['distributor'];
	$place = $_POST['place'];

	$sql_statement = "INSERT INTO distributes (id, `key`, place)
						VALUES ($id, $key, '$place')";
	

	$result = mysqli_query($db, $sql_statement);

	header ("Location: r_distributes.php");
}


else if (isset($_POST['platform'])){ /// add watches

	$key = $_POST['key'];
	$platform = $_POST['platform'];
	$id = $_POST['id'];

	$sql_statement = "INSERT INTO watches (id, `key`, platform)
						VALUES ($id, $key, '$platform')";
	

	$result = mysqli_query($db, $sql_statement);

	header ("Location: r_watches.php");
}


else
{

	echo "The form is not set.";

}


?>