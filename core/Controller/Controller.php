<?php

namespace Core\Controller;

/**
 * Class controller, class maitresse rendu erreur
 */
class Controller {

	protected $viewPath;
	protected $template = 'default';
	
	/**
	 * Permet de rendre une page ainsi que de porter les variables
	 *
	 * @param string $view
	 * @param array $variables
	 * @return void
	 */
	protected function render($view, $variables = []) {
		ob_start();
		extract($variables);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$getPage = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
		$content = ob_get_clean();
		require($this->viewPath . 'Templates/' . $this->template . '.php');
	}

	public function forbidden() {
		header('HTTP/1.0 403 Forbidden');
		die('Accés refuser');
	}

	public function notFound() {
		header('HTTP/1.0 404 Not Found');
		die('Page innexistante');
	}


}
