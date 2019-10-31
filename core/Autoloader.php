<?php
namespace Core;
/**
 * Autoload class
 * @package Core
 */
class Autoloader {

    /**
     * Register autoloader
     *
     * @return void
     */
    public static function register() :void {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

	/**
     * Require the file you need for your class
     *
     * @param string $class
     * @return void
     */
    public static function autoload(string $class) :void {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }

}