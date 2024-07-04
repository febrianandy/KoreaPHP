<?php
namespace App\Middlewares;

class AuthMiddleware {
    public function handle(): bool
    {
        if (!isset($_SESSION['token']) || !isset($_SESSION['user_id'])) {
            $sql = "SELECT token,user_id WHERE user_id = ?";
            header('Location: /login');
            return false;
        }

        return true;
    }
}
