<?php

define('CONTROLLERS_PATH', __DIR__ . '/controllers');
define('CONTROLLER_PATTERN_NAME', '{name}Controller.class.php');
define('ACTION_PATTERN_NAME', '{name}Action');

function getActionName($name)
{
	return str_replace('{name}', $name, ACTION_PATTERN_NAME);
}

function getControllerName($name)
{
	return str_replace('{name}', ucfirst($name), CONTROLLER_PATTERN_NAME);
}

function getControllerPath($name)
{
	return CONTROLLERS_PATH . '/' . $name;
}