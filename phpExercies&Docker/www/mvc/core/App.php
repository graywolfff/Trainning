<?php
class App {

  protected $controller = "home";
  protected $action = "show";
  protected $params = [];

  function __construct() {
    // $arr = $this->urlProcess();
    if(isset($_GET['controller'])){
            $user_controller = $_GET['controller'];
        }
    if(isset($_GET['action'])){
      $user_action = $_GET['action'];
    }


    if(file_exists("../mvc/controllers/". $user_controller .".php")){
      $this->controller =$user_controller;
    }
    require_once "../mvc/controllers/". $this->controller .".php";
    $this->controller = new $this->controller;
    if(method_exists($this->controller, $user_action)){
      $this->action = $user_action;
    }

    // if(isset($arr[1])){
    //   if(method_exists($this->controller, $arr[1])){
    //     $this->action = $user_action
    //   }
    //   unset($arr[1]);
    // }
    //
    // $this->params = $arr?array_values($arr):[];
    call_user_func([$this->controller, $this->action]);
    // call_user_func_array([$this->controller, $this->action], $this->params);
  }

  // function urlProcess(){
    // if(isset($_SERVER['QUERY_STRING'])){
    //   return explode("/", filter_var(trim($_SERVER['QUERY_STRING'], "/")));
    //
    // }

  // }
}
?>
