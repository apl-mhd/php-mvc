<?php
declare(strict_types = 1);

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    

    private Router $router;

    protected function  setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }


    /** @test **/
    public function it_registers_a_route(): void
    {
        $this->router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertEquals($expected,$this->router->routes());
    }

    /** @test **/
    public function it_registers_get_route(): void
    {
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertEquals($expected,$this->router->routes());
    }
    
    /** @test **/
    public function it_registers_post_route(): void
    {
        $this->router->post('/users', ['Users', 'store']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'store'],
            ],
        ];

        $this->assertEquals($expected,$this->router->routes());
    }

    /** @test **/
    public function there_are_no_routes_when_router_is_created(): void
    {
        $router = new Router();
        $this->assertEmpty((new Router())->routes());
    }
    

}