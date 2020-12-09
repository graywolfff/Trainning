<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container">
    <h2>Welcome to Home view</h2>
    <?php
    $result = $data["data"];
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
                echo "<td><img src = ".$row['image'] . " width='150px' /></td>";
                // echo "<td>" . $row['image'] . "</td>";
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
    ?>
  </div>
  </body>
</html>
