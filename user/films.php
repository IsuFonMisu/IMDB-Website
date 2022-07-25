<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Films</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
        <style>
        .myDiv {
          border: 5px outset red;
          background-color: lightblue;    
          text-align: center;
          align-self: left;
          width: 50%;
        }
        </style>
    </head>
    <body>
        <header>
            <a class="logo" href="main_page.php"><img src="images/logo.svg" alt="logo" width = "149px" height = "100px" ></a>
            <p style= "font-size:50px;padding-left: 33% ;color:white" >FILMS</p>
        </header>


        <div class = "myDiv">
            <?php
            include "films_table.php";
            ?>
        </div>


        <div class="myDiv2">

            <div>
                <h2> People who worked in searched Films </h2>

                <form action="films.php" method="POST">

                    <input type="text" id="find_films" name="find_films" placeholder="Type Film's name to Search">

                    <button class ="button2">Search</button>

                </form>
                <table>
                    <?php
                    if($_POST)
                    {
                        include "config.php";

                        if (isset($_POST['find_films'])){

                            $input = $_POST['find_films'];

                            ///selecting films

                            $f_sql_statement = "
                                        SELECT name AS fname, year AS year, films.key AS fkey, genre , films.rating
                                        FROM  films 
                                        WHERE films.name LIKE '$input%'";

                            $f_result = mysqli_query($db, $f_sql_statement);

                            while($frow = mysqli_fetch_assoc($f_result))   
                            {
                                echo "<tr> <th> Film Name </th><th> Rating </th>  <th> Genre </th> <th> Year </th> </tr> ";

                                echo " <tr> <td>" . $frow['fname'] . "</td><td>" . $frow['rating'] ." </td>  <td>" . $frow['genre'] . "</td> <td>". $frow['year'].  "</td> </tr>";

                                echo "<tr> <th> Film Name </th><th> Name </th>  <th> Duty </th> <th> Role </th> </tr> ";

                                ////// producers

                                $fkey = $frow['fkey'];
                                $fname= $frow['fname'];

                                $sql_statement ="
                                SELECT producers.name AS pname
                                FROM producers, funds
                                WHERE producers.ssn=funds.ssn AND funds.key = $fkey";

                                $result = mysqli_query($db, $sql_statement);

                                if (mysqli_num_rows($result)==0)
                                    echo "<tr> <td>". $fname ."  </td><td> No Recorded </td><td> Producer</td><td> Found </td> </tr> ";

                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>" . 
                                    "<td>" . $fname . "</td>". 
                                    "<td>" . $row['pname'] . "</td>".  
                                    "<td> Producer </td>".  
                                    "<td> </td>".  
                                    "</tr>";  
                                }
                                ////// directors

                                $sql_statement ="
                                SELECT directors.name AS dname
                                FROM directors, directs
                                WHERE directors.ssn=directs.ssn AND directs.key = $fkey";

                                $result = mysqli_query($db, $sql_statement);
                                
                                if (mysqli_num_rows($result)==0)
                                    echo "<tr> <td>".  $fname ."</td><td> No Recorded </td><td> Director </td><td> Found </td> </tr> ";

                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>" . 
                                    "<td>" . $fname . "</td>". 
                                    "<td>" . $row['dname'] . "</td>".  
                                    "<td> Director </td>".  
                                    "<td> </td>".  
                                    "</tr>"; 
                                }
                                ////// writers

                                $sql_statement ="
                                SELECT writers.name AS wname
                                FROM writers, writes
                                WHERE writers.ssn=writes.ssn AND writes.key = $fkey";

                                $result = mysqli_query($db, $sql_statement);

                                if (mysqli_num_rows($result)==0)
                                    echo "<tr> <td>".  $fname ."</td><td> No Recorded </td><td> Writer </td><td> Found </td> </tr> ";

                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>" . 
                                    "<td>" . $fname . "</td>". 
                                    "<td>" . $row['wname'] . "</td>".  
                                    "<td> Writer </td>".  
                                    "<td> </td>".  
                                    "</tr>"; 
                                }

                                ////// Actors

                                $sql_statement ="
                                SELECT actors.name AS aname, plays.role 
                                FROM actors, plays
                                WHERE actors.ssn=plays.ssn AND plays.key = $fkey";

                                $result = mysqli_query($db, $sql_statement);

                                if (mysqli_num_rows($result)==0)
                                    echo "<tr> <td>".  $fname ."</td><td> No Recorded </td><td> Actors </td><td> Found </td> </tr> ";

                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>" . 
                                    "<td>" . $fname . "</td>". 
                                    "<td>" . $row['aname'] . "</td>".  
                                    "<td> Actor </td>".  
                                    "<td>" . $row['role'] . "</td>".  
                                    "</tr>"; 
                                }


                                ////// Audience

                                echo "<tr> <th> Film Name </th><th> Country </th><th> Platform </th><th> Number </th> </tr>";

                                $sql_statement ="
                                SELECT audience.how_many, watches.platform , audience.from_where, SUM(audience.how_many) AS sum
                                FROM audience, watches
                                WHERE audience.id=watches.id AND watches.key = $fkey";

                                $result = mysqli_query($db, $sql_statement);
                                $sum=0;
                                if (mysqli_num_rows($result)==1)
                                    echo "<tr> <td>".  $fname ."</td><td> No Recorded </td><td> Audience Number </td><td> Found </td> </tr> ";
                                else{
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo 
                                        "<tr>" . 
                                        "<td>" . $fname . "</td>". 
                                        "<td>" . $row['from_where']  . "</td>".  
                                        "<td>" . $row['platform']  . "</td>".  
                                        "<td>" . $row['how_many'] . "</td>".  
                                        "</tr>";
                                        $sum=$row['sum'];

                                    }
                                }
                                echo 
                                "<tr>" . 
                                "<th>" . $fname . "</th>". 
                                "<th> Total </th>".  
                                "<th> Audience </th>".  
                                "<th>" . $sum . "</th>".  
                                "</tr>"; 

                            }



                        }
                        else{}
                    }
                    ?>
                
                </table>


            </div>


        </div>



    </body>

</html>