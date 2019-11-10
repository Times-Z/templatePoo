<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AutoloaderTest extends TestCase {

    public function testRegister() {
        $this->assertIsBool(\App\Autoloader::register());
    }

    public function testAutoload() {
        $this->assertNull(\App\Autoloader::autoload('App'));
    }
}
