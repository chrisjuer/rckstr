<?php
/**
 * Autoloader for PHP classes
 *
 * @package  DanceClasses
 */

function autoload($class_name){

	$prefix = 'RCKSTR';
	$dir = 'src';

	$class = substr($class_name, strlen($prefix));
	$class = str_replace('\\', '/', $class);

	if (file_exists(plugin_dir_path( __DIR__) . $dir . $class . '.php')) {
		require plugin_dir_path( __DIR__) . $dir . $class . '.php';
	}
}

spl_autoload_register('autoload');