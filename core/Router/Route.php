<?php

namespace Core\Router;

class Route {

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable) {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with($param, $regex) {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function match($url) {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch($match) {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    public function call() {
        if (is_string($this->callable)) {
            $params = explode('.', $this->callable);
            if ($params[0] === 'admin') {
                $controller = 'App\\Controller\\Admin\\' . ucfirst($params[1]) . 'Controller';
                $action = $params[2];
                $controller = new $controller;
                return $controller->$action();
                return call_user_func_array([$controller, $params[2]], $this->matches);
            } else {
                $controller = 'App\\Controller\\' . ucfirst($params[0]) . 'Controller';
                $action = $params[1];
                $controller = new $controller;
                return $controller->$action();
                return  call_user_func_array([$controller, $params[1]], $this->matches);
            }
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
        
    }

}
