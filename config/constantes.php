<?php

$path_info = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : '/';

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('URI', $path_info);
define('HOST', $_SERVER["HTTP_HOST"]);