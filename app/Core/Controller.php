<?php

namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }
    
    protected function json(array $data, int $statusCode = 200): void {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
