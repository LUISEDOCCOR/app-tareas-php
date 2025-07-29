<?php
namespace App\Core;
use App\Core\View;

class Router
{
    private $routes = [];
    private $names = [];

    private function addRoute($route, $controller, $method, $name, $httpMethod)
    {
        $this->routes[$httpMethod][$route] = [
            "controller" => $controller,
            "method" => $method,
        ];
        $this->names[$name] = ["route" => $route];
    }

    public function getRouteByName($route) {}

    public function dispatch($httpMethod, $uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        if (isset($this->routes[$httpMethod][$uri])) {
            $data = $this->routes[$httpMethod][$uri];
            $controller = new ($data["controller"])();
            $controller->{$data["method"]}();
        } else {
            http_response_code(404);
            View::render("errors/404.php", "errors_layout.php");
        }
    }

    public function get($route, $controller, $method, $name)
    {
        $this->addRoute($route, $controller, $method, $name, "GET");
    }

    public function post($route, $controller, $method, $name)
    {
        $this->addRoute($route, $controller, $method, $name, "POST");
    }

    public function put($route, $controller, $method, $name)
    {
        $this->addRoute($route, $controller, $method, $name, "PUT");
    }

    public function delete($route, $controller, $method, $name)
    {
        $this->addRoute($route, $controller, $method, $name, "DELETE");
    }
}
