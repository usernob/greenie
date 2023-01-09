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
        $data["db"]["user"] = $cart_model->getUserAndCartById($_SESSION["_id"]);
        $data["db"]["barang"] = $cart_model->getAllBarangInCart($_SESSION["_id"]);
        return $this->view("layout/cart", $data);
    }
    public function add($id_barang)
    {
        if (!isset($_SESSION["_id"])) {
            return http_response_code(301);
        }
        $cart_model = $this->model("Cart_model");
        try {
            $cart_model->addCart($id_barang, $_SESSION["_id"]);
            $data = "success";
        } catch (\PDOException $e) {
            $data = $e->getMessage();
        }
        echo $data;
    }

    public function delete($id_barang)
    {
        $this->model("Cart_model")->deleteCart($id_barang, $_SESSION["_id"]);
        return header("location:" . BASE_URL . "/cart");
    }

    public function request()
    {
        $cart_model = $this->model("Cart_model");
        $list_id_cart = [];
        $data["db"]["user"] = $cart_model->getUserAndCartById($_SESSION["_id"]);
        for ($i = 0; $i < count($_POST); $i++) {
            if (isset($_POST["checkbox-" . $i])) {
                array_push($list_id_cart, $_POST["checkbox-" . $i]);
            }
        }
        $data["db"]["cart"] = $cart_model->getSelectedCart($list_id_cart);
        $data["db"]["address"];
        return $this->view("layout/cart", $data, "request");
    }
}
