# OOP TEMPLATE [PHP]
 [![Project license](https://img.shields.io/pypi/l/ansicolortags.svg)](https://github.com/Crash-Zeus/templatePoo/blob/master/LICENSE)
 [![PHP version](https://img.shields.io/badge/php-%3E%207.0-green)](https://www.php.net/downloads.php)
 [![PHP version](https://img.shields.io/badge/Apache%20module%20RewriteEngine-On-green)](https://httpd.apache.org/docs/2.4/fr/mod/mod_rewrite.html)

A simple OOP template 

## Installation

Download or clone the project in www folder of your local server

```bash
git clone https://github.com/Crash-Zeus/templatePoo.git
```
Disclaimer : 

If you use the intern server off PHP for launch the project, your path (for picts, css, jss etc) wont be correct


For fix that, your path are not `src="<?=RACINE?>public/images/picture.png"` but `src="/images/picture.png"` in views

---

## Config

Configure the config/config.php with your parameters if you want connect in your DB

```php
return [
	"db_user" => "your_DB_username",
	"db_password" => "your_DB_password",
	"db_host" => "your_DB_host",
	"db_name" => "your_DBname"
];
```
---
## For add page :
1. Add your route in public/index.php :
```php
// No params
$router->get('/routeName', 'viewName.functionName');
// 1 param
$router->get('/routeName/:param', 'viewName.functionName');
// 2 param
$router->get('/routeName/:param1/:param2', 'viewName.functionName');
// etc...
```
2. Add your controller in app/Controller :
```php
<?php

namespace App\Controller;

// If your view is "test" the controller name is "TestController

class TestController extends AppController {

    public function __construct() {
        parent::__construct();
    }

}
```
3. Add the corresponding view on app/Views :
```html
<!-- The view name is "viewName".php in the router -->
<!-- She content the HTML of page you want to display like : -->
<h1>Hello world !</h1>
```
4. Create the function in your controller :
```php
<?php

namespace App\Controller;

class TestController extends AppController {

    public function __construct() {
        parent::__construct();
	}
	// If your functionName is "testFunction" the function name is "testFunction()"
	
	public function testFunction() {
		// if you want transfer variable from here to view use compact()
		// after you can use variable in view 
		$test = 1;
		$somevariable = 'Yes';

		$this->render('view', compact('test','somevariable'));
	}
}
```
5. Go to route ! Enjoy !

---
## For receiving data from POST request :
1. Repeat (just if you want separate view for the form) the steps 2 to 4
2. Add the route on public/index.php :
```php
$router->post('routeName', 'viewName.functionName');
```
---
## Tips
- If you modify the folder name, don't forget to change the `RACINE` constance in public/index.php
- You can create forms with the `Core\HTML\BoostrapForm` class

## Contributing
Pull requests are welcome ! You can fork the project to add your improvements.

It is an WIP project

## License
[MIT](https://github.com/Crash-Zeus/templatePoo/blob/master/LICENSE) 

 Crash Zeus - 2019