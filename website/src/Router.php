<?php

namespace In3050Inm428WebDev\PhpMvc;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        try{
            $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $uri = str_replace('/php_mvc', '', $uri);
        $method =  $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
        }catch (\Exception $e) {
            // Log or display the error
            echo "Error: " . $e->getMessage();
        }
        
    }
}