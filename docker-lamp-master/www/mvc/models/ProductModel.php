<?php
class ProductModel extends Db{
  
  public function getAll(){
    $query = 'SELECT * FROM Product';
    return mysqli_query($this->con, $query);
  }
}
?>
