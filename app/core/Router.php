<?php
class Router
{
    private $routes = [];

    public function route($url, $controllerMethod)
    {
        $this->routes[$url] = $controllerMethod;
    }

    public function dispatch($url)
    {
        if (array_key_exists($url, $this->routes)) {
            $parts = explode('@', $this->routes[$url]);
            $controllerName = $parts[0];
            $methodName = $parts[1];

            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            // Handle 404 or redirect to a default page
            echo '404 Not Found';
        }
    }
}
?>