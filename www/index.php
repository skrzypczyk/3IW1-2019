<?php

require __DIR__ . '/utils.php';

define('ROUTES_FILE_PATH', __DIR__ . '/routes.yml');

$uri = $_SERVER["REQUEST_URI"];
$routes = yaml_parse_file(ROUTES_FILE_PATH);

// condition : si la route est inexistante
if (!array_key_exists($uri, $routes))
{
	die('404 not found');
}

$route = $routes[$uri];

$action		= getActionName($route['action']);
$controller 	= getControllerName($route['controller']);
$pathController = getControllerPath($controller);

// condition : si le fichier de controller est inexistant
if (!file_exists($pathController))
{
	die('Une erreur est survenue : fichier inexistant.');
}

require $pathController;

$class = str_replace('.class.php', '', $controller);

// condition : si la classe est inexistante
if (!class_exists($class))
{
	die('Une erreur est survenue : classe inexistante.');
}

$instance = new $class();

// condition : si la méthode est inexistante
if (!method_exists($instance, $action))
{
	die('Une erreur est survenue : méthode inexistante.');
}
			
$instance->$action();








