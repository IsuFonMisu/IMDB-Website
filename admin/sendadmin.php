<?php 

include "config.php";

if (isset($_POST['delete_id'])){

	$selection_ssn = $_POST['delete_id'];

	$sql_statement = "DELETE FROM actors WHERE ssn = $selection_ssn";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_actors.php");

}

else if(isset($_POST['delete_name'])){


	$selection_name = $_POST['aname'];

	$sql_statement = "DELETE FROM actors WHERE name = '$selection_name'";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_actors.php");
}



else if(isset($_POST['delete_lower'])){

	$lBound = $_POST['delete_lower'];
	$uBound = $_POST['delete_upper'];

	$sql_statement = "DELETE FROM actors WHERE age > '$lBound' AND age <'$uBound '";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: admin_actors.php");
}


else
{

	echo "The form is not set.";

}

?>