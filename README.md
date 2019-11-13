# OOP TEMPLATE [PHP]
 [![Project license](https://img.shields.io/pypi/l/ansicolortags.svg?style=flat-square)](https://github.com/Crash-Zeus/templatePoo/blob/master/LICENSE)
 [![PHP version](https://img.shields.io/badge/php-%3E%207.3-brightgreen?style=flat-square)](https://www.php.net/downloads.php)
 [![PHP version](https://img.shields.io/badge/Apache%20module%20RewriteEngine-On-brightgreen?style=flat-square)](https://httpd.apache.org/docs/2.4/fr/mod/mod_rewrite.html)
 [![PHP UNIT](https://img.shields.io/badge/php%20unit-v%208-brightgreen?style=flat-square)](https://phpunit.de/)
 [![TEST VALIDATION](https://img.shields.io/badge/tests-%E2%9C%94%EF%B8%8F-brightgreen?style=flat-square)]()

*A simple OOP template what i use for my different project*

## Installation

Download or clone the project in `www` folder of your local server

```bash
git clone https://github.com/Crash-Zeus/templatePoo.git
```
Disclaimer : 

~~Not use with internal PHP server~~

✅ __Fixed__

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
$router->get('/routeName', 'controllerName.functionName');
// 1 param
$router->get('/routeName/:param', 'controllerName.functionName');
// 2 params
$router->get('/routeName/:param1/:param2', 'controllerName.functionName');
// etc...

// Or with parameter pattern (regEX)
$router->get('/routeName/:id', 'controllerName.functionName')->with('id', '([0-9]+)');

// Or same with controller in different folder (app/Controller/folderName/controllerName)
$router->get('/routeName','folderName.controllerName.functionName');
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
3. Add the corresponding view in app/Views :
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
$router->post('routeName', 'controllerName.functionName');
```

## If you want just execute code but not in a view :
Create the route you need and add an anonymous function with parameters and code you want to execute
```php
$router->get('routeName/:param', function($param) {
			echo "Execute anonymous function with param : {$param}";
			});
```
---
## Tips
- ~~If you modify the project folder name, don't forget to change the `RACINE` and `ROUTE` constance in public/index.php~~ (fixed)
- You can create forms with the `Core\HTML\BoostrapForm` class
- To start test with php test use `./vendor/bin/phpunit` in racine folder

## Contributing
Pull requests are welcome ! You can fork the project to add your improvements.

It is an Work in progress project

*This template is not perfect i know :)*

*But i want participate in git for give example where OOP php is use in an MVC arch*

*My code is not very very clean, but is not very dirt, i perfect my code in time ^^*

*And sorry if my English is not perfect, i work that ! i promise you !*

## License
[MIT](https://github.com/Crash-Zeus/templatePoo/blob/master/LICENSE) 

 Crash Zeus - 2019