<?php
namespace Core\Database;
use \PDO;

/**
 * Class Database, permet de se connecter a la bdd
 */
Class MysqlDatabase extends Database {

	private $db_name;
	private $db_user;
	private $db_password;
	private $db_host;
	private $pdo;

    public function __construct($db_name, $db_user = 'local', $db_password = 'admin', $db_host = 'localhost') {

		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_host = $db_host;

	}
	
	/**
	 * Initialise PDO si il ne l'est pas déjà, évite les fuites de mémoire en ne l'initialisant qu'une fois
	 *
	 * @return object
	 */
	private function getPDO() {
		
		if ($this->pdo === null) {
			$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . '', '' . $this->db_user . '', '' . $this->db_password . '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	/**
	 * Execute une requète SQL
	 *
	 * @param string $statement
	 * @return object
	 */
	public function query($statement, $class_name = null, $one = false) {
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
	 * Fait une requète préparer
	 * Option de fetch all ou juste 1 objet / class
	 * 
	 * @param string $statement
	 * @param array $options
	 * @param string $class_name
	 * @return object
	 */
	public function prepare($statement, $options, $class_name = null, $one = false) {
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

	public function lastInsertId() {
		return $this->getPDO()->lastInsertId();
	}

}
