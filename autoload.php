<?php

require_once '/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

spl_autoload_register('my_autoloader');

function my_autoloader($classname) {
	require_once('src\\' . str_replace('\\', '/', $classname) . '.php');
	//require_once($classname . '.php');
}

function debug($variable, $value) {
	print(strtoupper($variable) . ': ' . $value . '<br/>');
}

