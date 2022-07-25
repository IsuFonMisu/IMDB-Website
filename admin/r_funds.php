<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Funds Relation</title>
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

                <tr>  <th> Producer Name </th> <th> SSN </th> <th> Film Name </th> <th> Film Key </th> <th> Amount ($)</th> </tr> 

                    <?php

                    include "config.php";

                    $sql_statement = "SELECT producers.name AS pname, films.name AS fname, producers.ssn, films.key, funds.amount FROM producers, films,funds WHERE producers.ssn = funds.ssn AND films.key = funds.key";

                    $result = mysqli_query($db, $sql_statement);

                    while($row = mysqli_fetch_assoc($result))
                    {

                        echo "<tr>" .
                        "<th>" . $row['pname']  . "</th>" . 
                        "<th>" . $row['ssn']    . "</th>" . 
                        "<th>" . $row['fname']  . "</th>" . 
                        "<th>" . $row['key']    . "</th>" . 
                        "<th>" . $row['amount'] . "</th>" . 
                        "</tr>";
                    }

                    ?>

                </table>
            </div>

                    <div class ="myDiv2">
            <b> Adding Funds Relation </b>
            <form action="r_add.php" method="POST">

                <input type="text" id="ssn" name="producer" placeholder="Type Producer's SSN">                

                <input type="text" id="key" name="key" placeholder="Type Films's key"><br>

                <input type="text" id="amount" name="amount" placeholder="Type Funded Amount"><br>                



                <button class= "button2">ADD</button>
            </form> 
        </div>  



    </body>