<?php

use PHPUnit\Framework\TestCase;

class MysqlDatabaseTest extends TestCase {

    public function testQuery() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $config = $db->query("SELECT * FROM users");

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $db->query("SELECT * FROM users", null, true);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $db->query("SELECT * FROM users", 'users', true);

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $db->query("SELECT * FROM users WHERE username = 'oui'", null, true);

        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testPrepare() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $config = $db->prepare("SELECT * FROM users WHERE id = :id", ['id' => '2']);

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $db->prepare("SELECT * FROM users WHERE id = :id", ['id' => '2'], null, true);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $db->prepare("SELECT * FROM users WHERE id = :id", ['id' => '2'], 'user', true);

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $db->prepare("SELECT * FROM users WHERE id = :id", ['id' => '9'], null, true);

        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testLastInsertId() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $config = $db->lastInsertId();
        
        $this->assertIsString($config);
        $this->assertIsScalar($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }
}