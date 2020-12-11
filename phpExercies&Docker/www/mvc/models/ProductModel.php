<?php
class ProductModel extends Db{

  public function getAll(){
    $query = 'SELECT * FROM Product';
    return mysqli_query($this->con, $query);
  }

  public function getOne($index){
    $query = "SELECT * FROM Product WHERE id=$index";
    return mysqli_query($this->con, $query);
  }

  public function addOne($params=[]){
    if(trim($params[0]) != "") {

      if($params[2] != '/images/'){

        $sql = "INSERT INTO Product (title, description, image, status)
        VALUES ('$params[0]', '$params[1]','$params[2]' , $params[3])";
      }else{
        $sql = "INSERT INTO Product (title, description, status)
        VALUES ('$params[0]', '$params[1]', $params[3])";

      }

      mysqli_query($this->con, $sql);
    }
  }

  public function removeOne($param){
        if(is_numeric($param)){

            // DELETE FROM table_name WHERE column_name=some_value
            $sql = "DELETE FROM Product WHERE id=$param";
            mysqli_query($this->con, $sql);
            return header("Location: /admin/show", true, 301);
            exit();
        }
 }
 public function editOne($param=[]){
   if(is_numeric($param[0])){
     // UPDATE table_name SET column1=value, column2=value2,... WHERE column_name=some_value
     if($param[3] != '/images/'){
       $sql = "UPDATE Product SET title='$param[1]', description='$param[2]', image='$param[3]', status='$param[4]' WHERE id=$param[0]";
     }else{
        $sql = "UPDATE Product SET title='$param[1]', description='$param[2]', status='$param[4]' WHERE id=$param[0]";
     }
     if(mysqli_query($this->con, $sql)){

     }else {
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }


   }

 }

}
?>
