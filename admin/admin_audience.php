<?php 

include "config.php";

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Audience</title>
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

		<div class = "myDiv">
			<?php
				include "audience_table.php";
			?>
		</div>

		<div class ="myDiv2">
			<b> Adding Audience </b>
			<form action="admin_add.php" method="POST">
			  	<input type="text" id="from" name="from_where" placeholder="Type the country"><br>

			  	<input type="text" id="id" name="id" placeholder="Type ID"><br>
			  	<input type="text" id="many" name="how_many" placeholder="Type the number of viewers"><br>


			  	<button class= "button2">ADD</button>
			</form>	
		</div>	

	</body>
</html>