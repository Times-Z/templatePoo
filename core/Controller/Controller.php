<?php

namespace Core\Controller;

/**
 * @package Core\Controller
 */
class Controller {

	protected string $viewPath;
	protected string $template = 'default';
	
	/**
	 * Render the page
	 *
	 * @param string $view
	 * @param array $vars
	 * @return void
	 */
	protected function render(string $view, array $vars = []) :void {
		ob_start();
		extract($vars);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$getPage = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
		$content = ob_get_clean();
		require($this->viewPath . 'Templates/' . $this->template . '.php');
		die();
	}

	/**
	 * Generate an page (if specified) for HTTP 403 errors
	 *
	 * @return void
	 */
	public function forbidden() :void {
		header('HTTP/1.0 403 Forbidden');
		die('Accés refuser');
	}

	/**
	 * Generate an page (if specified) for HTTP 404 errors
	 *
	 * @return void
	 */
	public function notFound() :void {
		header('HTTP/1.0 404 Not Found');
		die('Page innexistante');
	}


}
