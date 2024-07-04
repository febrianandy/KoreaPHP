<?php
namespace App\Core;

use App\Core\Request; 

class Router {

    private static array $validMethods = ['GET', 'POST', 'PUT', 'DELETE'];
    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        $method = strtoupper($method);
        if (!in_array($method, self::$validMethods)) {
            throw new \InvalidArgumentException("Invalid HTTP method: {$method}");
        }

        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middlewares' => $middlewares,
        ];
    }


    public static function run(): void
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $foundRoute = null;
        $params = [];

        foreach (self::$routes as $route) {
            if ($method === $route['method'] && self::pathMatches($route['path'], $path, $params)) {
                $foundRoute = $route;
                break;
            }
        }

        if ($foundRoute) {
            foreach ($foundRoute['middlewares'] as $middlewareClass) {
                $middleware = new $middlewareClass();
                if (!$middleware->handle()) {
                    return;
                }
            }

            $controller = new $foundRoute['controller']();
            $function = $foundRoute['function'];
            $request = new Request();
            try {
                $controller->$function($request, ...array_values($params));
            } catch (\Exception $e) {
                Response::error($e->getMessage(), 500);
            }
        } else {
            self::notFound();
        }
    }

    private static function pathMatches(string $pattern, string $path, array &$params): bool
    {
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = preg_replace('/{([^\/]+)}/', '(?P<$1>[^\/]+)', $pattern);
        $pattern = "/^{$pattern}$/i";

        if (preg_match($pattern, $path, $matches)) {
            foreach ($matches as $key => $value) {
                if (!is_int($key)) {
                    $params[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }
            }
            return true;
        }

        return false;
    }

    private static function notFound(): void
    {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['error' => '404 Not Found']);
    }
}
