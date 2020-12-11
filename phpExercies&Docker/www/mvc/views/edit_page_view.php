<?php include "_base_Header.php"; ?>
<!--<progress Image </progress> -->

<!-- end-->
<?php
  $result = $data["data"];
  $row = $result->fetch_array();
?>

<h2>Edit</h2>
<button class="btn float-right" onclick="load_admin_view_page()">back</button>
<button class="btn float-right mr-2" onclick="load_admin_view_page()">show</button>
<script>
  function load_admin_view_page(){
    location.href = "/admin/show";
  }
</script>
<form action="#" enctype="multipart/form-data" method="POST">
     <div class="form-row">
       <div class="form-group col-md-12">

         <hr />
       </div>

     </div>
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputTitle">Title</label>
              <input type="text" value="<?php echo $row['title'] ?>" class="form-control" name="title" id="inputTitle" placeholder="Enter Title">
          </div>
      </div>
      <div class="form-group">
          <label for="inputDes">Description</label>

          <textarea class="form-control" name="description" id="inputDes" rows="3"><?php echo $row['description']?> </textarea>
      </div>
      <div class="form-row">

          <label for="customFile">Image</label>
          <div class="custom-file">

              <input type="file" name="image" src="<?php echo $row['image']?> " class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile"><?php echo $row['image']?></label>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <img id="blah" src="<?php echo $row['image']?>" alt="your image"/>


      </div>
      <div class="form-row">
          <label for="status_select">Status</label>
          <div class="form-group col-md-12">
              <select name="status" class="form-control" id="status_select">
                  <option>Enable</option>
                  <option>Disable</option>
              </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("load", function () {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  $(".custom-file-input").on("change", function () {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
  }

  $("#customFile").change(function () {
      readURL(this);
      $('#blah').css("display", "block");
  });
  $("#customFile").load(function () {
      readURL(this);
      $('#blah').css("display", "block");
  });
</script>

<?php include "_base_Footer.php"; ?>
