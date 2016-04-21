<?php

class Router
{

    public $controller;
    public $action;

    public function __construct($route)
    {

        $routeParts = explode('/', $route);

            if (2 == count($routeParts)) {
                $this->controller = $routeParts[0];
                $this->action = $routeParts[1];
            } else {
                $this->controller = 'news';
                $this->action = 'all';
            }
        }
}