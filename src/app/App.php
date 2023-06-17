<?php

declare(strict_types=1);

namespace App;
use App\Router;
use App\View;
use App\DB;
use PDO;
use App\Config;

class App
{

    private static DB $db;

    public function __construct(protected Router $router, protected array $request, protected Config $config) 
    {
        static::$db  = new DB($config->db ?? []);
    }

    public static function db(): DB{

        return static::$db;
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
