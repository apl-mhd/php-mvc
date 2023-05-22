<?php

declare(strict_types = 1);

namespace App;
use App\Exceptions\RouteNofFoundException;
class Router
{

    private array $routes;


    public function register(string $route, callable $action): self{

        $this->routes[$route] = $action;

        return $this;
    }

    public  function  resolve(string $requestUri){
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$route] ?? null;

        if (! $action){
            throw new RouteNofFoundException();
        }

        call_user_func($action);
    }

}