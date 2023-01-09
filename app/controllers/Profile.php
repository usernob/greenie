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
        $profile_model = $this->model("Profile_model");
        if (isset($_POST) && isset($_SESSION["_id"])) {
            if (isset($_FILES["foto"]["tmp_name"]) && $_FILES["foto"]["tmp_name"] != "") {
                $file_size = $_FILES['foto']['size'];
                $file_type = $_FILES['foto']['type'];
                if ($file_size > 2048000) {
                    $_SESSION["message"] = "file terlalu besar";
                } else if ($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg") {
                    $image = file_get_contents($_FILES['foto']['tmp_name']);
                    $profile_model->updateAvatar($_SESSION["_id"], $image);
                } else {
                    $_SESSION["message"] = "format file tidak didukung " . $file_type;
                }
            }
            $profile_model->updateUser($_SESSION["_id"], $_POST);
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
        $profile_model = $this->model("Profile_model");
        if (isset($_POST) && isset($_SESSION["_id"])) {
            $res = $profile_model->getPassword($_SESSION["_id"]);
            if (password_verify($_POST["old_pw"], $res["password"])) {
                $profile_model->updatePassword($_SESSION["_id"], $_POST);
                $_SESSION["message"] = "password berhasil diubah";
            } else {
                $_SESSION["message"] = "password lama salah";
            }
        }
        echo $res;
        return header("location:" . BASE_URL . "/profile/password");
    }

    public function address($id_address = null)
    {
        $profile_model = $this->model("Profile_model");
        $this->getUserAndCart($data);
        $data["db"]["address"] = $profile_model->getAddress($_SESSION["_id"]);
        $this->view("layout/profile", $data, __FUNCTION__);
    }
    public function add_address()
    {
        $this->getUserAndCart($data);
        $this->view("layout/profile", $data, __FUNCTION__);
    }
    public function add_address_handler()
    {
        $res = $this->model("Profile_model")->addUserAddress($_SESSION["_id"], $_POST);
        if ($res > 0) {
            header("location:" . BASE_URL . "/profile/address");
        }
    }
    public function change_address($id_address = null)
    {
        if ($id_address == null) {
            return http_response_code(400);
        }
        $res = $this->model("Profile_model")->changeUserAddress($id_address, $_SESSION["_id"]);
        if ($res > 0) {
            return http_response_code(200);
        } else {
            return http_response_code(500);
        }
    }
    public function delete_address($id_address)
    {
        try {
            $this->model("Profile_model")->deleteAddress($id_address);
        } catch (PDOException $e) {
            echo $e;
            $_SESSION["message"] = "tidak bisa menghapus alamat default";
        }
        // return header("location:" . BASE_URL . "/profile/address");
    }
}
