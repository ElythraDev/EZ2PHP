<?php

class Router {
    private array $routes = [];

    public function get(string $path, callable $handler) {
        $this->add('GET', $path, $handler);
    }

    private function add(string $method, string $path, callable $handler) {
        $pattern = preg_replace('#\{(\w+)\}#', '(?P<$1>[^/]+)', $path);
        $pattern = "#^$pattern$#";
        $this->routes[] = compact('method', 'pattern', 'handler');
    }

    public function dispatch(string $method, string $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;
            if (preg_match($route['pattern'], $uri, $matches)) {
                return call_user_func($route['handler'], array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
            }
        }
        http_response_code(404);
        require __DIR__ . '/pages/404.php';
    }
}

// 注册路由
$router = new Router();
$router->get('/', function() {
    require __DIR__ . '/pages/sample.php';
});