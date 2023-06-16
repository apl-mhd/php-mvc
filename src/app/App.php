<?php

declare(strict_types=1);

namespace App;
use App\Router;
use App\View;

class App
{

    public function __construct(protected Router $router, protected array $request) 
    {
    }

    public function run()
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                strtolower($this->request['method'])
            );
        } catch (\App\Exceptions\RouteNotFoundException $e) {

            http_response_code(404);
            echo View::make('error/404');
        }
    }
}
