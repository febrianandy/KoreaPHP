<?php
namespace App\Middlewares;

class AuthMiddleware {
    public function handle(): bool
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            return false;
        }
        return true;
    }
}
