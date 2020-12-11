<?php
session_start();
// if(isset($_GET['controller'])){
//         $controller = $_GET['controller'];
//         echo $controller;
//     }
require_once "../mvc/Bridge.php";

$my_app = new App();
?>
