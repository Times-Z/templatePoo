<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ConfigTest extends TestCase {

    public function testConfigGetInstance() {
        $config = Core\Config::getInstance(ROOT . '/config/config.php');
        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testGetLanguage() {
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en_UK';
        $config = Core\Config::getLanguage();
        $this->assertIsString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testGet() {
        $key = '';
        $config = Core\Config::getInstance(ROOT . '/config/config.php')->get($key);
        $this->assertIsNotString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

}
