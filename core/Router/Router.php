<?php

namespace Core\Router;

use Core\Controller\Controller;

/**
 * Router class, for adding an gps on your app !
 * @package Core\Router
 */
class Router {

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct(?string $url) {
        $this->url = $url;
    }

    /**
     * Get the page for an request method GET
     *
     * @param string $path
     * @param string $callable
     * @param string $name
     * @return object
     */
    public function get(string $path, $callable, $name = null) :object {
        return $this->add($path, $callable, $name, 'GET');
    }

    /**
     * Get the page for an request method POST
     *
     * @param string $path
     * @param string $callable
     * @param string $name
     * @return object
     */
    public function post(string $path, $callable, $name = null) :object {
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * Add the route to named routes
     *
     * @param string $path
     * @param string $callable
     * @param string $name
     * @param string $method
     * @return Route
     */
    private function add(string $path, $callable, $name, $method) :Route {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    /**
     * Run the router
     *
     * @return object
     */
    public function run() : ?object {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            $controller = new Controller();
            $controller->notFound();
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        $controller = new Controller();
        $controller->notFound();
    }

}
