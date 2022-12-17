<?php

class Home extends Controller implements controller_index
{
    public function index()
    {
        $home_model = $this->model("Home_model");
        if (isset($_SESSION["_id"])) {
            $res = $home_model->getUserById($_SESSION["_id"], "avatar");
        }
        $barang = $home_model->getAllBarang();
        $data["db"]["user"] = $res;
        $data["db"]["barang"] = $barang;
        $data["title"] = "Greenie - Home";
        $this->view("layout/home", $data);
    }
}
