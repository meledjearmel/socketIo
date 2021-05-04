<?php

function dump (...$args)
{
    echo '<pre style="background:#000;width:97%;height:auto;padding:20px;color:#fff;margin:auto;">';
    var_dump(...$args);
    echo '</pre>';
}

function js ($path, bool $is_library = false)
{
    $basePath = $is_library ? "/lib/" : "/js/";

    if (is_array($path)) {
        foreach ($path as $url) {
            $path = str_replace('.js', '', $path);
            $src ='http://' . HOST . $basePath . $url . '.js';
            echo "<script src=\"$src\"></script>";
        }
    } else {
        $path = str_replace('.js', '', $path);
        $href = 'http://' . HOST . $basePath . $path . '.js';
        echo "<script src=\"$href\"></script>";
    }
}

function css ($path, bool $is_library = false)
{
    $basePath = $is_library ? "/lib/" : "/css/";

    if (is_array($path)) {
        foreach ($path as $url) {
            $url = str_replace('.css', '', $url);
            $href = 'http://' . HOST . $basePath . $url . '.css';
            echo "<link href=\"$href\" rel=\"stylesheet\">";
        }
    } else {
        $path = str_replace('.css', '', $path);
        $href = 'http://' . HOST . $basePath . $path . '.css';
        echo "<link href=\"$href\" rel=\"stylesheet\">";
    }
}

function lib ($path, bool $is_js_library = true)
{
    if ($is_js_library) {
        js($path, true);
    } else {
        css($path, true);
    }
}

function view (string $view, ?array $vars = null)
{
    if ($vars) {
        extract($vars);
    }

    $view = str_replace('.', DS, $view);
    $view = str_replace('/', DS, $view);
    require ROOT . DS . 'src' . DS . $view . '.php';
}

function inc (string $partial)
{
    $partial = str_replace('.', DS, $partial);
    $partial = str_replace('/', DS, $partial);
    include ROOT . DS . 'src' . DS . $partial . '.php';
}