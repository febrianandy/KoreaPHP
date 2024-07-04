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

    public function show(Request $request, $id)
    {
    
        $response = [
            'id' => $id,
            'data' => 'Sample user data'
        ];
        $this->json($response);
    }

    public function create(Request $request)
    {
    
        $data = $request->getBody();
        $response = [
            'message' => 'User created',
            'data' => $data
        ];
        $this->json($response);
    }

    public function login(Request $request)
    {
        $response = [
            'message' => 'User created'
        ];
        $this->json($response);
    }
}
