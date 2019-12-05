<?php

namespace Core\Auth;

/**
 * Setup DB and user interaction
 * @package Core\Auth
 */
class DbAuth {

	private \Core\Database\MysqlDatabase $db;

    public function __construct(object $db) {
		$this->db = $db;
	}
	
	/**
	 * Get the user id from SESSION if exist
	 *
	 * @return mixed|bool
	 */
	public function getUserId() {
		if ($this->logged()) {
			return $_SESSION['auth']['id'];
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
	public function login(string $username, string $password) :bool {
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
		if ($user) {
			if (password_verify($password, $user->password)) {
				$_SESSION['auth']['id'] = $user->id;
				return true;
			}
		}
		return false;
	}

	/**
	 * Return the session if exist
	 *
	 * @return bool
	 */
	public function logged() :?bool {
		return isset($_SESSION['auth']);
	}

}
