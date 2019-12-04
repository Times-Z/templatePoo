<?php
namespace Core\Database;
use \PDO;

/**
 * Class for Mysql DBMS logic
 * @package Core\Database
 */
Class MysqlDatabase extends Database {

	private string $db_name;
	private string $db_user;
	private string $db_password;
	private string $db_host;
	private object $pdo;

    public function __construct(?string $db_name, ?string $db_user = 'local', ?string $db_password = 'admin', ?string $db_host = 'localhost') {
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_host = $db_host;
	}
	
	/**
	 * Initialise PDO object if not exist
	 *
	 * @return PDO
	 */
	private function getPDO() :PDO {
		if ($this->pdo === null) {
			$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . '', '' . $this->db_user . '', '' . $this->db_password . '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	/**
	 * Execute an simple query statement
	 *
	 * @param string $statement Sql statement
	 * @param bool|string $class_name Class name if you want use PDO::FETCH_CLASS
	 * @param boolean $one True if you want get one result only
	 * @return mixed
	 */
	public function query(string $statement, $class_name = null, bool $one = false) {
		$req = $this->getPDO()->query($statement);
		if (
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0
			) {
				return $req;
		}
		if ($class_name === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if ($one) {
			$data = $req->fetch();
		} else {
			$data = $req->fetchAll();
		}
		return $data;
	}

	/**
	 * Execute an prepare statement
	 *
	 * @param string $statement Sql statement
	 * @param array $options
	 * @param string $class_name
	 * @param boolean $one
	 * @return mixed
	 */
	public function prepare(string $statement, array $options, $class_name = null, bool $one = false) {
		foreach ($_POST as $key => $value) {
			if ($key !== \App::getInstance()->escapeHtml) {
				$_POST[$key] = trim(stripslashes(htmlentities(filter_var($value))));
			}
		}
		$req = $this->getPDO()->prepare($statement);
		$res = $req->execute($options);
		if (
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0
			) {
				return $res;
		}
		if ($class_name === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if ($one) {
			$data = $req->fetch();
		} else {
			$data = $req->fetchAll();
		}
		return $data;
	}

	/**
	 * Return the last insert ID
	 *
	 * @return string
	 */
	public function lastInsertId() :string {
		return $this->getPDO()->lastInsertId();
	}

}
