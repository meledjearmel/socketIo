<?php
    class Autoload {

        static function register()
        {
            self::loadFile();
            spl_autoload_register([__CLASS__, 'loadAppClass']);
            spl_autoload_register([__CLASS__, 'loadConfigClass']);
        }

        static private function loadAppClass ($class_name)
        {
            $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
            require ROOT . DS . 'App' . DIRECTORY_SEPARATOR . $class_name . '.php';
        }

        static private function loadConfigClass ($class_name)
        {
            $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
            require ROOT . DS . 'config' . DIRECTORY_SEPARATOR . $class_name . '.php';
        }

        static private function loadFile ()
        {
            require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'constantes.php';
            require ROOT . DS . 'config' . DIRECTORY_SEPARATOR . 'helper.php';
        }

    }