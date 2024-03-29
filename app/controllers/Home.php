<?php

class Home extends Controller
{
    private function checkUser(&$data, $model)
    {
        if (isset($_SESSION["_id"])) {
            $res = $model->getUserAndCartById($_SESSION["_id"]);
            $data["db"]["user"] = $res;
        }
    }

    public function index()
    {
        unset($_SESSION["query"]);
        $home_model = $this->model("Home_model");
        $data["db"]["category"] = $home_model->getCategory();
        $data["title"] = "Greenie";
        $this->checkUser($data, $home_model);
        $this->view("layout/home", $data);
    }

    public function detail($id)
    {
        $home_model = $this->model("Home_model");
        $assets = $home_model->getAssetBarangById($id);
        $barang = $home_model->getBarangById($id);
        $data["db"]["barang"] = $barang;
        $data["db"]["barang"]["assets"] = $assets;
        $data["title"] = "Greenie";
        $this->checkUser($data, $home_model);
        $this->view("layout/home", $data, __FUNCTION__);
    }

    public function search($url)
    {
        $home_model = $this->model("Home_model");
        if (!isset($url)) {
            return $this->view("404");
        }
        parse_str(parse_url($url)["query"], $params);
        $_SESSION["query"] = $params["q"];
        $data["title"] = "Greenie";
        $this->checkUser($data, $home_model);
        $this->view("layout/home", $data, __FUNCTION__);
    }

    public function get_barang($start = 1)
    {
        $home_model = $this->model("Home_model");
        $barang = $home_model->getAllBarang($start);
        $data["db"]["barang"] = $barang;
        $this->view("template/card_barang", $data);
    }

    public function search_barang($start = 1)
    {
        $home_model = $this->model("Home_model");
        $keyword = str_replace(" ", "|", $_SESSION["query"]);
        $res = $home_model->getAllBarangByKeyword($keyword, $start);
        $data["db"]["barang"] = $res;
        $this->view("template/card_barang", $data);
    }
}
