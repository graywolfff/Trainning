<?php
class Admin extends Controller{

  public function show(){
    $product_data = $this->model("ProductModel");
    $this-> view("admin_view",[
      "data" => $product_data->getAll()
    ]);
  }

  public function add(){
    // echo "add called";
    $this->view("add_one");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
      }
   }
  // call function insert db

            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = "/images/".$_FILES['image']['name'];
            if ($_POST['status'] == 'Disable'){
              $status = 0;
            }else{
              $status = 1;
            }
            $product = $this->model("ProductModel");
            $product->addOne([$title, $description, $image, $status]);
   }
 }//end of add function
   public function drop(){
       $index = $_GET['id'];
       $product = $this->model("ProductModel");
       $product->removeOne($index);
   }

   public function edit(){
     $index = $_GET['id'];
     $product_data = $this->model("ProductModel");
     $this-> view("edit_page_view",[
       "data" => $product_data->getOne($index)
     ]);

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       if(isset($_FILES['image'])){
       $errors= array();
       $file_name = $_FILES['image']['name'];
       $file_size =$_FILES['image']['size'];
       $file_tmp =$_FILES['image']['tmp_name'];
       $file_type=$_FILES['image']['type'];
       $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

       $expensions= array("jpeg","jpg","png");

       if(in_array($file_ext,$expensions)=== false){
          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
       }

       if($file_size > 2097152){
          $errors[]='File size must be excately 2 MB';
       }

       if(empty($errors)==true){
          move_uploaded_file($file_tmp,"images/".$file_name);
       }
    }
   // call function insert db

             $title = $_POST['title'];
             $description = $_POST['description'];
             $image = "/images/".$_FILES['image']['name'];
             if ($_POST['status'] == 'Disable'){
               $status = 0;
             }else{
               $status = 1;
             }
             $product = $this->model("ProductModel");
             $product->editOne([$index, $title, $description, $image, $status]);
    }



     // $this->view("add_one");
   }

}
?>
