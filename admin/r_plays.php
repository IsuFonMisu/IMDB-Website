<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Plays Relation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>


    <body>
        <header>
            <p style = "color: white"> Admin Relations </p>
            <nav>
                <ul class="nav__links">
                    <li><a href="r_plays.php">Plays</a></li>
                    <li><a href="r_funds.php">Funds</a></li>
                    <li><a href="r_directs.php">Directs</a></li>
                    <li><a href="r_distributes.php">Distributes</a></li>
                    <li><a href="r_watches.php">Watches</a></li>
                    <li><a href="r_writes.php">Writes</a></li>
                </ul>
            </nav>
            <a class="cta" href="report.php">Report</a>
        </header>
        <div class = "myDiv">
            <table>

                <tr> <th> Role </th> <th> Actor Name </th> <th> SSN </th> <th> Film Key </th> <th> Film Name </th> </tr> 

                    <?php

                    include "config.php";

                    $sql_statement = "
                    SELECT actors.name AS aname, films.name AS fname, actors.ssn, films.key, plays.role 
                    FROM actors,films,plays 
                    WHERE actors.ssn = plays.ssn AND films.key = plays.key";

                    $result = mysqli_query($db, $sql_statement);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $ssn = $row['ssn'];
                        $key = $row['key'];
                        $myActor = $row['aname'];
                        $myFilm = $row['fname'];
                        $role = $row['role'];



                        echo "<tr>" . "<th>" . $role ."</th>" . "<th>" . $myActor . "</th>" . "<th>" . $ssn . "</th>" . "<th>" . $key. "</th>" . "<th>" . $myFilm. "</th>"  . "</tr>";
                    }

                    ?>

                </table>
            </div>

                    <div class ="myDiv2">
            <b> Adding Plays Relation </b>
            <form action="r_add.php" method="POST">

                <input type="text" id="ssn" name="ssn" placeholder="Type Actors SSN">                

                <input type="text" id="key" name="key" placeholder="Type Films's key"><br>

                <input type="text" id="role" name="role" placeholder="Type Actor's role"><br>                



                <button class= "button2">ADD</button>
            </form> 
        </div>  



    </body>