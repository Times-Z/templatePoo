<?php
namespace Core;

use Locale;

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
	 * @return self
	 */
	public static function getInstance(string $file):self {
		if(is_null(self::$instance)) {
			self::$instance = new Config($file);
		}
		return self::$instance;
	}

	/**
	 * Return user's language (fr, en, es etc..)
	 *
	 * @return string
	 */
	public static function getLanguage():string {
		return substr(Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']), 0, 2);
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