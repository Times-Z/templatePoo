<?php

use Core\Table\Table;
use PHPUnit\Framework\TestCase;

final class TableTest extends TestCase {

    public function testAll() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $table = new Table($db);
        $config = $table->all();

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testQuery() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $table = new Table($db);
        $config = $table->query("SELECT * FROM users");

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $table->query("SELECT id FROM users");

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $table->query("SELECT id FROM users WHERE id = ?", ['1']);

        $this->assertIsArray($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $table->query("SELECT id FROM users WHERE id = ?", ['1'], true);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testFind() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $table = new Table($db);
        $config = $table->find(1);

        $this->assertIsObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotBool($config);
        $this->assertIsNotString($config);
        $this->assertIsNotScalar($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $table->find(0);

        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testUpdate() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $table = new Table($db);
        $config = $table->update(1, ['name' => 'testUpdateOk']);
        
        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);

        $config = $table->update(5, ['name' => 'testOk']);
        
        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testCreate() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $table = new Table($db);
        $config = $table->create(['name' => 'testCreateOk']);
        
        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

    public function testDelete() {
        $db = new Core\Database\MysqlDatabase('unit_test_bdd');
        $table = new Table($db);
        $config = $table->delete((int)$db->lastInsertId());
        
        $this->assertIsBool($config);
        $this->assertIsScalar($config);
        $this->assertIsNotObject($config);
        $this->assertIsNotArray($config);
        $this->assertIsNotString($config);
        $this->assertIsNotCallable($config);
        $this->assertIsNotFloat($config);
        $this->assertIsNotInt($config);
    }

}
