<?php

use Database\Database;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Autoload.php';

    Autoload::register();
    $db = new Database();

    ob_start();

    if (URI === '/') {
        view('login');
    } elseif (URI === '/tchat') {
        view('tchat');
    } else {
        view('404');
    }

    $content = ob_get_clean();

    view('layout.app', compact('content'));