<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AutoloaderCoreTest extends TestCase {

    public function testCoreRegister() {
        $config = \App\Autoloader::register();
        $this->assertIsBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }
    
    public function testCoreAutoload() {
        $config = \App\Autoloader::autoload('App');
        $this->assertNull($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

}
