<?php

namespace Core\Auth;

/**
 * Setup DB and user interaction
 * @package Core\Auth
 */
class DbAuth {

	private $db;

	/**
	 * Renvoie une erreur si Database de Core précisé
	 *
	 * @param string $db
	 */
    public function __construct($db) {
		$this->db = $db;
	}
	
	public function getUserId() {
		if ($this->logged()) {
			return $_SESSION['auth'];
		}
		return false;
	}

	/**
	 * Login to the site (not used)
	 *
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	public function login($username, $password) {
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
		if ($user) {
			if (password_verify($password, $user->password)) {
				$_SESSION['auth'] = $user->id;
				return true;
			}
		}
		return false;
	}

	/**
	 * Return the session if exist
	 *
	 * @return array
	 */
	public function logged() {
		return isset($_SESSION['auth']);
	}

}
