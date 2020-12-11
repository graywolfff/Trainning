
    <h2>Manage</h2>
    <button id="addRow" class="btn float-right" onclick="load_add_one_page()">Add new</button>
    <script>
      function load_add_one_page(){
        location.href = "/admin/add";
      }
    </script>
    <?php
    $result = $data["data"];
    if ($result->num_rows > 0) {

        echo '<table id="example" class="display table table-striped table-bordered" style="width:100%">';
        echo '<thead>';
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Thumb</th>";
        echo "<th>Title</th>";
        echo '<th>Status</th>';
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
            echo "<td class='id'>" . $row['id'] . "</td>";
            if(is_null($row['image'])){
              echo "<td></td>";
            }else {
              echo "<td class='img_src'><img src = " . $row['image'] . " width='150px' /></td>";
            }

            echo "<td class='title'>" . $row['title'] . "</td>";
            echo '<td class="status">' . $row['status'] . "</td>";
            echo '<td><button type="button" class="btn_show btn btn-secondary">show</button>
                  <button type="button" class="btn btn-secondary edit_btn">Edit</button>
                  <button type="button" class="btn btn-secondary delete_btn">Delete</button>
            </td>';
            echo '<td class="description" style="display:none;">' . $row['description'] . "</td>";
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 class="modal-title" id="Title-modal">Title & Description</h3>

                </div>
                <div class="modal-body">

                    <div class="row dataTable">
                        <div class="col-md-4">
                            <div><img id='img_des' src="" alt="image of product" width="250px"></div>
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
        var productTable = $('#example').DataTable({
          "searching": false
        });
        $(".btn_show").click(function(){
          var $row = $(this).closest("tr");
          $("#Title-modal").text($row.find(".title").text());
          $("#img_des").attr("src",$row.find('.img_src img').attr('src'));
          $("#product_description").text($row.find(".description").text());
          $('#DescModal').modal("show");
        });

        $(".delete_btn").click(function(){
          var $row = $(this).closest("tr");
          var $index = parseInt($row.find(".id").text());
          // console.log($row.find(".id").text());
          location.href = "/admin/drop/" + $index;

        });<!-- end block delete -->

        $(".edit_btn").click(function(){
          var $row = $(this).closest("tr");
          var $index = parseInt($row.find(".id").text());
          // console.log($row.find(".id").text());
          location.href = "/admin/edit/" + $index;

        });<!-- end block edit_btn -->



    });

</script>
