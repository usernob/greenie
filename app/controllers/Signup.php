<?php

class Signup extends Controller implements controller_index
{
    public function index()
    {
        $data["title"] = "Greenie - Signup";
        $this->view("signup", $data);
    }
    public function validate()
    {
        $model = $this->model("Signup_model");
        if ($model->get("email", $_POST["email"])["total"] > 0) {
            $_SESSION["email_has_signup"] = true;
            $_SESSION["email"] = $_POST["email"];
            return header("location:" . BASE_URL . "/login");
        }
        if ($model->get("username", $_POST["username"])["total"] > 0) {
            $_SESSION["username_exist"] = true;
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["no_hp"] = $_POST["no_hp"];
            return header("location:" . BASE_URL . "/signup");
        }
        $res = $model->newSignup($_POST);
        if (isset($res["id"])) {
            $_SESSION["_id"] = $res["id"];
            return header("location:" . BASE_URL . "/home");
        }
    }
}
