<?php

use App\Autoloader;
use Core\Config;
use Core\Database\MysqlDatabase;

/**
 * Class App, class de type factory et singleton qui s'occupe de la gestion du site dans sa globalité
 */
class App{

	/**
	 * Définis le titre de base du site
	 *
	 * @var string
	 */
	public $title = 'Mon titre par défaut';

	public $escapeHtml = '';

	private $dbInstance;

	private static $instance;
	
	/**
	 * Crée une instance de l'objet app si il n'existe pas sinon renvoie juste l'instance
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
	 * Charge les autoloader App et Core
	 *
	 * @return Autoloader
	 */
	public static function load() {
		session_start();
		require ROOT .'/app/Autoloader.php';
		Autoloader::register();
		require ROOT . '/core/Autoloader.php';
		Core\Autoloader::register();
	}

	/**
	 * Chope la table à la volé
	 *
	 * @param string $name
	 * @return Database->getdb()
	 */
	public function getTable($name) {
		$class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
		return new $class_name($this->getDb());
	}
	
	/**
	 * Chope la database chargé en config
	 *
	 * @return 
	 */
	public function getDb() {
		$config = Config::getInstance(ROOT . '/config/config.php');
		if (is_null($this->dbInstance)) {
			$this->dbInstance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_password'), $config->get('db_host'));
		}
		return $this->dbInstance;
	}

}