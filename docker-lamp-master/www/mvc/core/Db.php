<?php
class Db{
  public $con;
  protected $servername = "db";
  protected $username = "root";
  protected $password = "test";
  protected $dbname = "myDb";

  function __construct(){
    $this->con = mysqli_connect($this->servername, $this->username, $this->password);
    if($this->con === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }else{
      mysqli_select_db($this->con, $this->dbname);
      mysqli_query($this->con, "SET NAMES 'utf8mb4'");
    }
  }
}
?>
