<html>
 <head>
  <title>Home Page</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">

    <?php
    // $routeAction = $_SERVER["REQUEST_URI"];
    echo "Requested URL =  '{$_SERVER['QUERY_STRING']}''";


    $mysqli = mysqli_connect('db', 'root', 'test', "myDb", 3306);

    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt select query execution
    $sql = "SELECT * FROM Product";
    if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>title</th>";
                    echo "<th>description</th>";
                    echo "<th>image</th>";
                    echo "<th>status</th>";
                    echo "<th>create_at</th>";
                    echo "<th>update_at</th>";
                echo "</tr>";
            while($row = $result->fetch_array()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['image'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['create_at'] . "</td>";
                    echo "<td>" . $row['update_at'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            $result->free();
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    // Close connection

    mysqli_close($mysqli);

    ?>
    </div>
</body>
</html>
