<?php 

include "config.php";

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Actors</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>


	<body>

		<header>
            <nav>
                <ul class="nav__links">
                    <li><a href="admin_films.php">Films</a></li>
                    <li><a href="admin_actors.php">Actors</a></li>
                    <li><a href="admin_directors.php">Directors</a></li>
                    <li><a href="admin_writers.php">Writers</a></li>
                    <li><a href="admin_producers.php">Producers</a></li>
                    <li><a href="admin_distributors.php">Distributors</a></li>
                    <li><a href="admin_casting_directors.php">Casting Directors</a></li>
                    <li><a href="admin_audience.php">Audience</a></li>
                </ul>
            </nav>
            <a class="cta" href="report.php">Report</a>
        </header>


        <div class ="myDiv2">
			<b> Adding Actors </b>
			<form action="admin_add.php" method="POST">
			  	<input type="text" id="name" name="name" placeholder="Type Actor's name"><br>

			    <label for="gender"> Select gender</label>
			      <select name="gender">
			      <option value="M">Male</option>
			      <option value="F">Female</option>


			  	<input type="text" id="age" name="age" placeholder="Type Actor's age"><br>
			  	<input type="text" id="ssn" name="ssn" placeholder="Type Actors SSN"><br>


			  	<label for="started">Started:</label>
			  	<input type="date" id="started" name="started"> <br>
			  	<label for="retired">Retired:</label>
			  	<input type="date" id="retired" name="retired"><br>

			  	<button class= "button2">ADD</button>
			</form>	
		</div>

		<div class = "myDiv">
			<?php
			include "actors_table.php";
			?>
		</div>

		<div class = "myDiv2">
			<b>SSN to be deleted   </b>
			<form action="sendadmin.php" method="POST">
				<input type="text" id="aname" name="delete_id" placeholder="Type Actor's ssn to be deleted">

				<button class="button2">DELETE</button class="button2">
			</form>

			<br>



			<b>Actor's Name To Be Deleted   </b>
			<form action="sendadmin.php" method="POST">

				<input type="text" id="aname" name="delete_name" placeholder="Type Actor's name to be deleted">

				<button class="button2">DELETE</button class="button2">
			</form>

			<br>
			<b>Age range to be deleted (Lower-Upper)   </b>

			<form action="sendadmin.php" method="POST">

				<input type="text" id="lower" name="delete_lower" placeholder="Lower Bound" value=0 width = "50%">
				<input type="text" id="upper" name="delete_upper" placeholder="Upper Bound" value =150 width = "50%"><br>

				<button class="button2">DELETE</button class="button2">
			</form>
		</div>




	

	</body>




</html>