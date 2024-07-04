<?php
namespace App\Core;

class Request {
    private array $queryParams;
    private array $body;
    private array $headers;
    private string $method;

    public function __construct()
    {
        $this->queryParams = $_GET;
        $this->body = json_decode(file_get_contents('php://input'), true) ?? [];
        $this->headers = $this->getAllHeaders();
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    private function getAllHeaders(): array
    {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) === 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}
