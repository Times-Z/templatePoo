<?php
namespace Core;

/**
 * Config class
 * Singleton
 * @package Core
 */
class Config {

	private $settings = [];
	private static $instance;


    public function __construct($file) {
		$this->settings = require($file);

	}

	/**
	 * Create an instance or return if exist
	 *
	 * @param string $file
	 * @return void
	 */
	public static function getInstance(string $file) {
		if(is_null(self::$instance)) {
			self::$instance = new Config($file);
		}
		return self::$instance;
	}
	
	/**
	 * get settings
	 *
	 * @param string $key
	 * @return void
	 */
	public function get(string $key) {
		if (!isset($this->settings[$key])) {
			return null;
		} else {
			return $this->settings[$key];
		}
	}

}