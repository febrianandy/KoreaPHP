<?php
namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;

class HomeController extends Controller {
    
    public function index()
    {
       $this->view("Home");
    }

    public function login()
    {
       $this->view("Login");
    }
}
