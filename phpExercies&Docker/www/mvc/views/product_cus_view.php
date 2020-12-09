<!DOCTYPE html>
<html lang="vi" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <h2>List Post</h2>
    <?php
    $result = $data["data"];
    if ($result->num_rows > 0) {
        echo '<table id="example" class="display table table-striped table-bordered" style="width:100%">';
        echo '<thead>';
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Thumb</th>";
        echo "<th>Title</th>";
        echo "<th>Status</th>";
        echo "<th>Actions</th>";
        echo '<th style="display:none;" >Description</th>';
        echo "</tr>";
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_array()) {
            if ($row['status'] == 0) {
                $row['status'] = 'Disabled';
            } else {
                $row['status'] = 'Enabled';
            }
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><img src = " . $row['image'] . " width='150px' /></td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo '<td><button type="button" class="btn btn-secondary">show</button></td>';
            echo '<td style="display:none;">' . $row['description'] . "</td>";
            echo "</tr>";
        }
        echo '<tbody>';

        $result->free();
    } else {
        echo "No records matching your query were found.";
    }
    ?>
    <!-- Test block-->
    <div class="modal fade" id="DescModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 class="modal-title" id="Title-modal">Title & Description</h3>

                </div>
                <div class="modal-body">

                    <div class="row dataTable">
                        <div class="col-md-4">
                            <div id="img_des"></div>
                        </div>
                        <div class="col-md-8">
                            <span type="text" id="product_description">
                        </div>
                    </div>

                    <br>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


</div> <!-- Close container -->


<script>
    $(document).ready(function () {
        var productTable = $('#example').DataTable();
        $('#example').on('click', 'tr', function () {
            // var name = $('td', this).eq().text();
            $("#Title-modal").text(productTable.row(this).data()[2]);
            $("#img_des").html("");
            $("#img_des").prepend(productTable.row(this).data()[1])
            $("#product_description").text(productTable.row(this).data()[5]);
            $('#DescModal').modal("show");
        });
    });
</script>

</body>
</html>
