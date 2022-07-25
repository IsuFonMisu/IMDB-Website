<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Directors</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a class="logo" href="main_page.php"><img src="images/logo.svg" alt="logo" width = "149px" height = "100px" ></a>
            <p style= "font-size:50px;padding-left: 30% ;color:white" >DIRECTORS</p>
        </header>
        <div class = "myDiv">
            <?php
            include "directors_table.php";
            ?>
        </div>
        <div class = "myDiv2">
                <h2>
                    Films directed by the directors
                </h2>

                <form action="directors.php" method="POST">

                    <input type="text" id="find_films" name="find_films" placeholder="Type Director's name to Search">

                    <button class ="button2">Search</button>

                </form>

                <table>
                    <tr> <th> Director Name </th> <th> Film Name </th><th> YEAR </th>  </tr> 
                    <?php
                    if($_POST)
                    {
                        include "config.php";

                        if (isset($_POST['find_films'])){

                            $input = $_POST['find_films'];

                            $sql_statement = "SELECT films.name AS fname, films.year AS year, directors.name AS aname FROM directs, films, directors WHERE films.key = directs.key AND directs.ssn=directors.ssn AND  directs.ssn IN 
                                                (SELECT ssn FROM directors WHERE directors.name LIKE '$input%' )";

                            $result = mysqli_query($db, $sql_statement);


                            while($row = mysqli_fetch_assoc($result))
                            {

                                $myFilm = $row['fname'];
                                $year = $row['year'];
                                $myActor = $row['aname'];


                                echo "<tr>" ."<th>" . $myActor . "</th>" . "<th>" . $myFilm . "</th>" . "<th>" . $year . "</th>" . "</tr>";
                            }
                        }
                        else{}
                    }
                    ?>
                </table>
        </div>
    </body>
</html>
