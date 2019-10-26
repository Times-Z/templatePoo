<?php

namespace Core\Table;

use Core\Database\Database;

/**
 * Class Table, class maitresse relation bdd
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
	 * Select all de la table de l'instance
	 *
	 * @return void
	 */
	public function all() {
		return $this->query('SELECT * FROM ' . $this->table);
	}


	/**
	 * Crée et execute une requete preparée ou non
	 *
	 * @param string $statement
	 * @param string $attr
	 * @param boolean $one
	 * @return void
	 */
	public function query($statement, $attr = null, $one = false) {
		if ($attr) {
			return $this->db->prepare($statement, $attr, str_replace('Table', 'Entity', get_class($this)), $one);
		} else {
			return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
		}

	}

	/**
	 * Chope l'id dans la table de l'instance
	 *
	 * @param int $id
	 * @return void
	 */
	public function find($id) {
		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
	}

	public function update($id, $fields) {
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

	public function delete($id) {
		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
	}

	public function create($fields) {
		$sql_parts = [];
		$attr = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attr[] = $v;
		}
		$sql_part = implode(', ', $sql_parts);
		return $this->query("INSERT INTO {$this->table} SET {$sql_part}", $attr, true);
	}

	public function extract($key, $value) {
		$records = $this->all();
		$return = [];
		foreach ($records as $v) {
			$return[$v->$key] = $v->$value;
		}
		return $return;
	}



}
