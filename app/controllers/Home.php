<?php

class Home extends Controller
{
    public function index()
    {
        $home_model = $this->model("Home_model");
        if (isset($_SESSION["_id"])) {
            $res = $home_model->getUserAndCartById($_SESSION["_id"]);
            $data["db"]["user"] = $res;
        }
        $barang = $home_model->getAllBarang();
        $data["db"]["barang"] = $barang;
        $data["title"] = "Greenie";
        $this->view("layout/home", $data);
    }

    public function detail($id)
    {
        $home_model = $this->model("Home_model");
        if (isset($_SESSION["_id"])) {
            $res = $home_model->getUserAndCartById($_SESSION["_id"]);
            $data["db"]["user"] = $res;
        }
        $assets = $home_model->getAssetBarangById($id[0]);
        $barang = $home_model->getBarangById($id[0]);
        $data["db"]["barang"] = $barang;
        $data["db"]["barang"]["assets"] = $assets;
        $data["title"] = "Greenie";
        $this->view("layout/home", $data, __FUNCTION__);
    }
}
