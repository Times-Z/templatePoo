<?php

namespace Core\Router;

/**
 * @package Core\Router
 */
class Route {

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct(string $path, $callable) {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * Add patern to an specific param
     *
     * @param string $param The param you want effect without the ":"
     * @param string $regex The regex you want use for this param
     * @return self
     */
    public function with(string $param, $regex) :self {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    /**
     * Check if the URL has a matching route
     *
     * @param string $url
     * @return boolean
     */
    public function match(string $url) :bool {
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

    /**
     * Return parsed matches
     *
     * @param string $match
     * @return string
     */
    private function paramMatch($match) :string {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    /**
     * Call the matches controller route
     *
     * @return \App\Controller\
     */
    public function call() :object {

        if (is_string($this->callable)) {
            $params = explode('.', $this->callable);
            if ($params[0] === 'admin') {
                $controller = 'App\\Controller\\Admin\\' . ucfirst($params[1]) . 'Controller';
                $action = $params[2];
                $controller = new $controller;
                $controller->$action();
                return call_user_func_array([$controller, $params[2]], $this->matches);
            } else {
                $controller = 'App\\Controller\\' . ucfirst($params[0]) . 'Controller';
                $action = $params[1];
                $controller = new $controller;
                return call_user_func_array([$controller, $params[1]], $this->matches);
                $controller->$action();
            }
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
        
    }

}
