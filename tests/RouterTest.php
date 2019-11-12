<?php

use Core\Router\Router;
use PHPUnit\Framework\TestCase;

final class RouterTest extends TestCase {

    public function testGet() {
        $router = new Router('/test');
        $config = $router->get('/test', 'index', null);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $router->get('', '', null);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $router->get('', '', 'test');

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testPost() {
        $router = new Router('/test');
        $config = $router->post('/test', 'index.post', null);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $router->post('', '', null);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $router->post('', '', 'test');

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

}
