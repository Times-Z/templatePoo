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
        $this->assertIsObject(App::getInstance());
    }

    public function testGetTable() {  
        $this->assertIsObject(App::getInstance()->getTable('Base'));
    }

    public function testGetDb() {
        $this->assertIsObject(App::getInstance()->getDb());
    }

}
