<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Directs Relation </title>
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

                <tr>  <th> Director Name </th> <th> Film Name </th> <th> SSN </th> <th> Film Key </th>  </tr> 

                    <?php

                    include "config.php";

                    $sql_statement = "SELECT directors.name AS dname, films.name AS fname, directors.ssn, films.key FROM directors,films,directs WHERE directors.ssn = directs.ssn AND films.key = directs.key";

                    $result = mysqli_query($db, $sql_statement);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $ssn = $row['ssn'];
                        $key = $row['key'];
                        $myDirector = $row['dname'];
                        $myFilm = $row['fname'];


                        echo "<tr>" . "<th>" . $myDirector. "</th>" . "<th>" . $myFilm . "</th>" . "<th>" . $ssn . "</th>" . "<th>" . $key. "</th>" . "</tr>";
                    }

                    ?>

                </table>
            </div>

                    <div class ="myDiv2">
            <b> Adding Directs Relation </b>
            <form action="r_add.php" method="POST">

                <input type="text" id="ssn" name="director" placeholder="Type Director's SSN">                

                <input type="text" id="key" name="key" placeholder="Type Films's key"><br>            


                <button class= "button2">ADD</button>
            </form> 
        </div>  



    </body>