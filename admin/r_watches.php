<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Watches Relation</title>
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

                <tr> <th> id </th> <th> from_where </th> <th> Film name </th> <th> Film Key </th> <th> how_many </th> <th> Platform </th> </tr> 

                    <?php

                    include "config.php";

                    $sql_statement = "
                    SELECT audience.how_many, films.name AS fname, audience.id, films.key, audience.from_where, watches.platform 
                    FROM audience,films,watches 
                    WHERE audience.id = watches.id AND films.key = watches.key";

                    $result = mysqli_query($db, $sql_statement);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row['id'];
                        $key = $row['key'];
                        $how_many = $row['how_many'];
                        $from_where = $row['from_where'];
                        $fname = $row['fname'];
                        $platform = $row['platform'];



                        echo "<tr>" . "<th>" . $id  . "<th>" . $from_where . "</th>" . "<th>" . $fname . "</th>" . "<th>" . $key. "</th>" . "<th>" . $how_many. "</th>" . "<th>" . $platform. "</th>"  . "</tr>";
                    }

                    ?>

                </table>
            </div>

                    <div class ="myDiv2">
            <b> Adding Watches Relation </b>
            <form action="r_add.php" method="POST">

                <input type="text" id="id" name="id" placeholder="Type audience_id">                

                <input type="text" id="key" name="key" placeholder="Type Films's key"><br>

                <input type="text" id="platform" name="platform" placeholder="Type platform"><br> 

                <button class= "button2">ADD</button>
            </form> 
        </div>  



    </body>