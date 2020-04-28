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
	 * @return string
	 */
	protected function render(string $view, array $vars = []) :string {
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
	 * @return string
	 */
	public function forbidden() :string {
		header('HTTP/1.0 403 Forbidden');
		die('Api overloaded 403 forbidden');
	}

	/**
	 * Generate an page (if specified) for HTTP 404 errors
	 *
	 * @return string
	 */
	public function notFound() :string {
		header('HTTP/1.0 404 Not Found');
		die('404 not found');
	}


}
