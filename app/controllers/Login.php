<?php

class Login extends Controller implements controller_index
{
    public function index()
    {
        $data["title"] = "Greenie - Login";
        $this->view("login", $data);
    }
    public function validate()
    {
        $res = $this->model("Login_model")->checkLogin($_POST);
        if (password_verify($_POST["password"], $res["password"])) {
            $_SESSION["_id"] = $res["id"];
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
