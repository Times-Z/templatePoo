<?php

namespace Core\Entity;

/**
 * Entity class
 * @package Core\Entity
 */
class Entity {

	/**
	 * Magic method
	 *
	 * @param string $key the name of the proprety
	 * @return mixed|null
	 */
	public function __get($key) {
		$method = 'get' .ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

}