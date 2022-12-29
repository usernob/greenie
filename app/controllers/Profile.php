<?php

class Profile extends Controller
{
    public function index()
    {
        if (!isset($_SESSION["_id"])) {
            return header("location:" . BASE_URL . "/login");
        }
        $data["db"]["user"] = $this->model("Profile_model")->getUserAndCartById($_SESSION["_id"]);
        $this->view("layout/profile", $data);
    }
    public function update()
    {
        if (isset($_POST)) {
            if (isset($_FILES["foto"]["tmp_name"]) && $_FILES["foto"]["tmp_name"] != "") {
                $file_size = $_FILES['foto']['size'];
                $file_type = $_FILES['foto']['type'];
                if ($file_size > 2048000) {
                    $_SESSION["message"] = "file terlalu besar";
                } else if ($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg") {
                    $image = file_get_contents($_FILES['foto']['tmp_name']);
                    $this->model("Profile_model")->updateAvatar($_SESSION["_id"], $image);
                } else {
                    $_SESSION["message"] = "format file tidak didukung " . $file_type;
                }
            }
            $this->model("Profile_model")->updateUser($_SESSION["_id"], $_POST);
            $_SESSION["message"] = $_SESSION["message"] ? $_SESSION["message"] : "update profile success";
        }
        return header("location:" . BASE_URL . "/profile");
    }
}
