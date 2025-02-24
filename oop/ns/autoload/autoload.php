<?php
spl_autoload_register(function ($class) {
    // echo "{{ {$class} }}\n"; //AutoLoader Test 
    $class = strtolower(str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, 'CloudStorage\\')));
    $file = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($file)) {
        include $file;
    }
});