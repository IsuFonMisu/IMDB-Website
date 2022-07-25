<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Audience</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a class="logo" href="main_page.php"><img src="images/logo.svg" alt="logo" width = "149px" height = "100px" ></a>
            <p style= "font-size:50px;padding-left: 30% ;color:white" >AUDIENCE</p>
        </header>
            <div class = "myDiv">
                <table>

                    <tr> <th> Film name </th> <th> How Many </th> <th> Where </th>  <th> Platform </th> </tr> 

                        <?php

                        include "config.php";

                        $sql_statement = "
                        SELECT audience.how_many, films.name AS fname, audience.id, films.key, audience.from_where, watches.platform 
                        FROM audience,films,watches 
                        WHERE audience.id = watches.id AND films.key = watches.key";

                        $result = mysqli_query($db, $sql_statement);

                        while($row = mysqli_fetch_assoc($result))
                        {

                            $how_many = $row['how_many'];
                            $from_where = $row['from_where'];
                            $fname = $row['fname'];
                            $platform = $row['platform'];



                            echo "<tr>". "<th>" . $fname . "</th>"  . "<th>" . $how_many. "</th>" . "<th>". $from_where . "</th>" . "<th>" . $platform. "</th>"  . "</tr>";
                        }

                        ?>

                    </table>
                </div>
                <div class = "myDiv2">
                    <h2>
                        Audience who watched selected film
                    </h2>

                    <form action="audience.php" method="POST">

                        <input type="text" id="find_audience" name="find_audience" placeholder="Type Film name to be searched">

                        <button class ="button2">Search</button>

                    </form>

                    <table>
                        <tr> <th> Film Name </th><th> Platform </th><th> Place </th><th> How Many </th>  </tr> 
                        <?php
                        if($_POST)
                        {
                            include "config.php";

                            if (isset($_POST['find_audience'])){

                                $input = $_POST['find_audience'];

                                $sql_statement = "SELECT films.name AS fname, audience.from_where  , audience.how_many, watches.platform FROM audience, films, watches WHERE films.key = watches.key AND watches.id=audience.id AND '$input'=films.name" ;

                                $result = mysqli_query($db, $sql_statement);


                                while($row = mysqli_fetch_assoc($result))
                                {

                                    $myFilm = $row['fname'];
                                    $Platform = $row['platform'];
                                    $Place = $row['from_where'];
                                    $HowMany = $row['how_many'];


                                    echo "<tr>" ."<th>" . $myFilm . "</th>" . "<th>" . $Platform . "</th>" . "<th>" . $Place . "</th>" . "<th>" . $HowMany ."</th>" . "</tr>";
                                }
                            }
                            else{}
                        }
                        ?>
                    </table>
                </div>


    </body>
</html>

