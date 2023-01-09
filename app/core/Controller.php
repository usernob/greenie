<?php

class Controller
{
    public function view(string $view,  array $data = [], string $route = "index"): void
    {
        $filename = "app/views/" . $view . ".php";
        if (file_exists($filename)) {
            require_once $filename;
        } else {
            echo "View for " . $filename . " Not Found";
        }
    }
    public function model(string $model)
    {
        $filename = "app/models/" . $model . ".php";
        if (file_exists($filename)) {
            require_once $filename;
            return new $model;
        } else {
            echo "Model" . $model . " Not Found";
        }
    }

    public function page_404()
    {
        $data["title"] = "404 - Not Found";
        $this->view("404", $data);
    }
}
