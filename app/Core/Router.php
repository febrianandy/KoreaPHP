<?php
namespace App\Core;

class Router {

    private static array $routes = [];

    /**
     * Register a route with the router.
     *
     * @param string $method HTTP method (GET, POST, etc.)
     * @param string $path Route path
     * @param string $controller Controller class name
     * @param string $function Controller method to call
     * @param array $middlewares Array of middleware class names
     */
    public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middlewares' => $middlewares,
        ];
    }

    
    public static function dispatch(): void
    {
        $path = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $foundRoute = null;

        foreach (self::$routes as $route) {
            // Check method and path match
            if ($method === $route['method'] && self::pathMatches($route['path'], $path)) {
                $foundRoute = $route;
                break;
            }
        }

        if ($foundRoute) {
            // Call middleware
            foreach ($foundRoute['middlewares'] as $middlewareClass) {
                $middleware = new $middlewareClass();
                $middleware->handle();
            }

            // Call controller method
            $controller = new $foundRoute['controller']();
            $function = $foundRoute['function'];
            $controller->$function();
        } else {
            self::notFound();
        }
    }

    /**
     * Helper function to check if a path matches the route pattern.
     *
     * @param string $pattern Route pattern (supports basic placeholders like {id})
     * @param string $path Requested path
     * @return bool Whether the path matches the pattern
     */
    private static function pathMatches(string $pattern, string $path): bool
    {
        // Escape slashes in the pattern
        $pattern = str_replace('/', '\/', $pattern);

        // Convert placeholders {id} to regex patterns
        $pattern = preg_replace('/{([^\/]+)}/', '(?P<$1>[^\/]+)', $pattern);

        // Add start and end delimiters, and case insensitive flag
        $pattern = "/^{$pattern}$/i";

        // Check if path matches pattern
        return (bool) preg_match($pattern, $path);
    }

    /**
     * Handle 404 Not Found.
     */
    private static function notFound(): void
    {
        http_response_code(404);
        echo '404 Not Found';
    }
}
