<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Writes Relation</title>
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

                <tr>  <th> Writer Name </th> <th> SSN </th> <th> Film Name </th> <th> Film Key </th> <th> Year</th> </tr> 

                    <?php

                    include "config.php";

                    $sql_statement = "SELECT writers.name AS wname, films.name AS fname, writers.ssn, films.key, writes.year FROM writes, films,writers WHERE writers.ssn = writes.ssn AND films.key = writes.key";

                    $result = mysqli_query($db, $sql_statement);

                    while($row = mysqli_fetch_assoc($result))
                    {

                        echo "<tr>" .
                        "<th>" . $row['wname']  . "</th>" . 
                        "<th>" . $row['ssn']    . "</th>" . 
                        "<th>" . $row['fname']  . "</th>" . 
                        "<th>" . $row['key']    . "</th>" . 
                        "<th>" . $row['year'] . "</th>" . 
                        "</tr>";
                    }

                    ?>

                </table>
            </div>

                    <div class ="myDiv2">
            <b> Adding Writes Relation </b>
            <form action="r_add.php" method="POST">

                <input type="text" id="ssn" name="writer" placeholder="Type Writer's SSN">                

                <input type="text" id="key" name="key" placeholder="Type Films's key"><br>

                <input type="text" id="year" name="year" placeholder="Type Year that script was written"><br>                



                <button class= "button2">ADD</button>
            </form> 
        </div>  



    </body>