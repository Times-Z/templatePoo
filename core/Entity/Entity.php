<?php

namespace Core\Entity;

/**
 * Class Entity, gère toute les entitées de l'api
 */
class Entity {

	/**
	 * Magic function récupère a la volé le get utilisé
	 *
	 * @param string $key
	 * @return string
	 */
	public function __get($key) {
		$method = 'get' .ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

}