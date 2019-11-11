<?php
use PHPUnit\Framework\TestCase;

final class DbAuthTest extends TestCase {

    public function testGetUserId() {
        $config = new Core\Auth\DbAuth(Core\Config::getInstance(ROOT . '/config/config.php'));
        $_SESSION['auth']['id'] = '0';

        $this->assertIsString($config->getUserId());
        $this->assertIsScalar($config->getUserId());
        $this->assertIsNotObject($config->getUserId());
        $this->assertIsNotArray($config->getUserId());
        $this->assertIsNotBool($config->getUserId());
        $this->assertIsNotCallable($config->getUserId());
        $this->assertIsNotFloat($config->getUserId());
        $this->assertIsNotInt($config->getUserId());

        unset($_SESSION['auth']);

        $this->assertIsScalar($config->getUserId());
        $this->assertIsBool($config->getUserId());
        $this->assertIsNotString($config->getUserId());
        $this->assertIsNotObject($config->getUserId());
        $this->assertIsNotArray($config->getUserId());
        $this->assertIsNotCallable($config->getUserId());
        $this->assertIsNotFloat($config->getUserId());
        $this->assertIsNotInt($config->getUserId());
    }

    public function testLogin() {
        $auth = new \Core\Auth\DbAuth(\App::getInstance()->getDb());
        $config = $auth->login('test', 'test');

        $this->assertIsScalar($config);
        $this->assertIsBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $auth->login('', '');

        $this->assertIsScalar($config);
        $this->assertIsBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $auth->login('goodLog', 'goodPass');

        $this->assertIsScalar($config);
        $this->assertIsBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testLogged() {
        $config = new Core\Auth\DbAuth(Core\Config::getInstance(ROOT . '/config/config.php'));

        $_SESSION['auth']['id'] = 'test';

        $this->assertIsBool($config->logged());
        $this->assertIsScalar($config->logged());
        $this->assertIsNotObject($config->logged());
        $this->assertIsNotString($config->logged());
        $this->assertIsNotArray($config->logged());
        $this->assertIsNotCallable($config->logged());
        $this->assertIsNotFloat($config->logged());
        $this->assertIsNotInt($config->logged());

        unset($_SESSION['auth']);

        $this->assertIsBool($config->logged());
        $this->assertIsScalar($config->logged());
        $this->assertIsNotObject($config->logged());
        $this->assertIsNotString($config->logged());
        $this->assertIsNotArray($config->logged());
        $this->assertIsNotCallable($config->logged());
        $this->assertIsNotFloat($config->logged());
        $this->assertIsNotInt($config->logged());
    }

}
