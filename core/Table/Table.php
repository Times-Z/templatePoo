<?php

namespace Core\Table;

use Core\Database\Database;

/**
 * Table class
 * @package Core\Table
 */
class Table {

	protected $table;
	protected $db;

    public function __construct(Database $db) {
		$this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name) . 's');
		}
	}


	/**
	 * Select all from table
	 *
	 * @return void
	 */
	public function all() {
		return $this->query('SELECT * FROM ' . $this->table);
	}


	/**
	 * Create and execute and simple query or an prepared statement
	 *
	 * @param string $statement
	 * @param array $attr
	 * @param boolean $one
	 * @return void
	 */
	public function query(string $statement, $attr = null, bool $one = false) {
		if ($attr) {
			return $this->db->prepare($statement, $attr, str_replace('Table', 'Entity', get_class($this)), $one);
		} else {
			return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
		}

	}

	/**
	 * Get all from an specifique id
	 *
	 * @param int $id
	 * @return void
	 */
	public function find(int $id) {
		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
	}

	/**
	 * Update instance table
	 *
	 * @param int $id
	 * @param array $fields
	 * @return void
	 */
	public function update(int $id, array $fields) {
		$sql_parts = [];
		$attr = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attr[] = $v;
		}
		$attr[] = $id;
		$sql_part = implode(', ', $sql_parts);
		return $this->query("UPDATE {$this->table} SET {$sql_part} WHERE id = ?", $attr, true);
	}

	/**
	 * Delete from id
	 *
	 * @param int $id
	 * @return void
	 */
	public function delete(int $id) {
		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
	}

	/**
	 * Insert into table
	 *
	 * @param array $fields
	 * @return void
	 */
	public function create(array $fields) {
		$sql_parts = [];
		$attr = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attr[] = $v;
		}
		$sql_part = implode(', ', $sql_parts);
		return $this->query("INSERT INTO {$this->table} SET {$sql_part}", $attr, true);
	}

	/**
	 * Extract value
	 *
	 * @param string $key
	 * @param string $value
	 * @return void
	 */
	public function extract(string $key, string $value) {
		$records = $this->all();
		$return = [];
		foreach ($records as $v) {
			$return[$v->$key] = $v->$value;
		}
		return $return;
	}



}
