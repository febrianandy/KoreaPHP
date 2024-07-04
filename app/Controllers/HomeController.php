<?php
namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;

class HomeController extends Controller {
    
    public function index(Request $request)
    {
        $response = [
            'data' => 'Sample user data'
        ];
        $this->json($response);
    }
}
