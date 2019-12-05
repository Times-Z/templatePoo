<?php

use App\Autoloader;
use Core\Config;
use Core\Database\MysqlDatabase;

/**
 * App class, config app
 * @package App
 */
class App {

	public string $title = 'Défault title';
	public string $escapeHtml = '';
	private Config $dbInstance;
	private static $instance;
	
	/**
	 * Return instance of App
	 *
	 * @return self
	 */
	public static function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new App;
		}
		return self::$instance;
	}

	/**
	 * Load App autoloader and core autoloader
	 *
	 * @return void
	 */
	public static function load() :void {
		session_start();
		require ROOT .'/app/Autoloader.php';
		Autoloader::register();
		require ROOT . '/core/Autoloader.php';
		Core\Autoloader::register();
	}

	/**
	 * Get the Table you need in /Table folder
	 *
	 * @param string $name
	 * @return object
	 */
	public function getTable(string $name) :object {
		$class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
		return new $class_name($this->getDb());
	}
	
	/**
	 * Get the database instance
	 *
	 * @return object
	 */
	public function getDb() :object {
		$config = Config::getInstance(ROOT . '/config/config.php');
		if (is_null($this->dbInstance)) {
			$this->dbInstance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_password'), $config->get('db_host'));
		}
		return $this->dbInstance;
	}

}