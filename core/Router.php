<?php

namespace app\core;

class Router
{
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public array $routes = [];

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();

            return call_user_func($callback);
        }

        http_response_code(404);
        echo "NOT FOUND!";
        exit;
    }

}