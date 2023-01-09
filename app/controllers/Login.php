<?php

class Login extends Controller
{
    public function index()
    {
        $data["title"] = "Greenie - Login";
        if (isset($_SESSION["_id"])) {
            unset($_SESSION["_id"]);
        }
        $this->view("login", $data);
    }
    public function validate()
    {
        $res = $this->model("Login_model")->checkLogin($_POST);
        if (password_verify($_POST["password"], $res["password"])) {
            $_SESSION["_id"] = $res["id_user"];
            if (isset($res["id_admin"])) {
                $_SESSION["admin"] = true;
            }

            if (isset($res["id_penjual"])) {
                $_SESSION["penjual"] = true;
            }

            header("location:" . BASE_URL . "/home");
            return;
        } else {
            $_SESSION['error'] = true;
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            header("location:" . BASE_URL . "/login");
        }
    }
}
