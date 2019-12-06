<?php
declare(strict_types=1);
require __DIR__ . '/../app/App.php';

$route = explode('/', dirname(__DIR__));
define('ROOT', dirname(__DIR__));
define('RACINE', '/' . end($route) . '/public/');
define('ROUTE', '/' . end($route) . '/');


use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase {

    public function testGetinstance() {
        $config = App::getInstance();
        $this->assertIsObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testGetTable() {
        $config = App::getInstance()->getTable('Base');
        $this->assertIsObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testGetDb() {
        $config = App::getInstance()->getDb();
        $this->assertIsObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

}
