<?php
namespace Core;

/**
 * Class Config, constitue la config de l'app
 * C'est une class "singleton", elle n'est instancié qu'une et une seule fois
 */
class Config {

	/**
	 * Constitue un tableau de paramètres
	 *
	 * @var array
	 */
	private $settings = [];

	/**
	 * Contient a terme l'instance unique de la class
	 *
	 * @var object
	 */
	private static $instance;


	/**
	 * Crée une instance unique une fois puis la stock dans $instance
	 *
	 * @return self
	 */
	public static function getInstance($file) {
		if(is_null(self::$instance)) {
			self::$instance = new Config($file);
		}
		return self::$instance;
	}

    public function __construct($file) {
		$this->settings = require($file);

	}
	
	public function get($key) {
		if (!isset($this->settings[$key])) {
			return null;
		} else {
			return $this->settings[$key];
		}
	}

}