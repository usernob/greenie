<?php

class Profile extends Controller
{
    public function getUserAndCart(&$data)
    {
        if (!isset($_SESSION["_id"])) {
            return header("location:" . BASE_URL . "/login");
        }
        $data["db"]["user"] = $this->model("Profile_model")->getUserAndCartById($_SESSION["_id"]);
    }
    public function index()
    {
        $this->getUserAndCart($data);
        $data["title"] = "Profile - Greenie";
        $this->view("layout/profile", $data);
    }
    public function update()
    {
        if (isset($_POST) && isset($_SESSION["_id"])) {
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

    public function password()
    {
        $this->getUserAndCart($data);
        $this->view("layout/profile", $data, __FUNCTION__);
    }
    public function update_password()
    {
        if (isset($_POST) && isset($_SESSION["_id"])) {
            $res = $this->model("Profile_model")->getPassword($_SESSION["_id"]);
            if (password_verify($_POST["old_pw"], $res["password"])) {
                $this->model("Profile_model")->updatePassword($_SESSION["_id"], $_POST);
                $_SESSION["message"] = "password berhasil diubah";
            } else {
                $_SESSION["message"] = "password lama salah";
            }
        }
        echo $res;
        return header("location:" . BASE_URL . "/profile/password");
    }

    public function address()
    {
        $this->getUserAndCart($data);
        $data["db"]["address"] = $this->model("Profile_model")->getAddress($_SESSION["_id"]);
        $this->view("layout/profile", $data, __FUNCTION__);
    }
    public function add_address()
    {
    }
}
