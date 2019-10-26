<?php
namespace Core;
/**
 * Class AutoLoader, permet de charger toute les classe sans ajouter les require manuellement
 * @package App
 */
class Autoloader {

    /**
     * Enregistre l'autoloader
     */
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

	/**
	 * Inclue le fichier correspondant a la class
	 *
	 * @param $class string le nom de la classe à charger
	 */
    public static function autoload($class) {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }

}