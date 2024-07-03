<?php

namespace App\Controllers;
use App\Core\Controller;

class HomeController extends Controller{
    public function index() {
        $data = [
            "hello" => "sd"
        ];
       $this->view("Home", $data);
    }

    public function create(){
        
    }
}