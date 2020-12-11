<?php
class Home extends Controller
{
    public function show()
    {
        $product_data = $this->model("ProductModel");
        $this-> view("home_view", [
      "data" => $product_data->getAll()
    ]);
    }
}
