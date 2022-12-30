<?php

class Cart extends Controller
{
    public function index()
    {
        $cart_model = $this->model("Cart_model");
        if (!isset($_SESSION["_id"])) {
            return header("location:" . BASE_URL . "/login");
        }
        $data["title"] = "Keranjang - Greenie";
        $res = $cart_model->getUserAndCartById($_SESSION["_id"]);
        $data["db"]["user"] = $res;
        $data["db"]["barang"] = $cart_model->getAllBarangInCart($_SESSION["_id"]);
        $this->view("layout/cart", $data);
    }
    public function add($id_barang)
    {
        if (!isset($_SESSION["_id"])) {
            return http_response_code(301);
        }
        $cart_model = $this->model("Cart_model");
        try {
            $cart_model->addCart($id_barang[0], $_SESSION["_id"]);
            $data = "success";
        } catch (\PDOException $e) {
            $data = $e->getMessage();
        }
        echo $data;
    }

    public function request()
    {
        var_dump($_POST);
    }
}
