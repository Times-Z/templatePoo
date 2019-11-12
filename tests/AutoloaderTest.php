<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AutoloaderTest extends TestCase {

    public function testRegister() {
        $config = \App\Autoloader::register();

        $this->assertIsBool($config);
        $this->assertIsNotString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testAutoload() {
        $config = \App\Autoloader::autoload('App');

        $this->assertNull($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotIterable($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }
}
