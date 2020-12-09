<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body>

    <div class="container">
    <h2>List Post</h2>
    <?php
    $result = $data["data"];
    if($result->num_rows > 0){
        echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
            echo '<thead>';
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>title</th>";
                echo "<th>description</th>";
                echo "<th>image</th>";
                echo "<th>status</th>";
                echo "<th>create_at</th>";
                echo "<th>update_at</th>";
            echo "</tr>";
            echo '</thead>';
            echo '<tbody>';
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
          echo '<tbody>';
        //   echo '<tfoot>';
        //   echo "<tr>";
        //       echo "<th>id</th>";
        //       echo "<th>title</th>";
        //       echo "<th>description</th>";
        //       echo "<th>image</th>";
        //       echo "<th>status</th>";
        //       echo "<th>create_at</th>";
        //       echo "<th>update_at</th>";
        //   echo "</tr>";
        //   echo '</tfoot>';
        // echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
    ?>
    <!-- test block -->


    <!-- ///fwefwe -->

  </div>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
  </body>
</html>
