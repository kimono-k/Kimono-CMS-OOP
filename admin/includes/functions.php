<?php
# Callback function for spl_autoload_register
function classAutoLoader($class) {
    $class = strtolower($class);
    $the_path = 'includes/'.$class.'.php';

    if (is_file($the_path) && !class_exists($class)) {
        require_once($the_path);
    }
}

# Autoloader - Loads the classes needed for a specific page
spl_autoload_register("classAutoLoader");


function redirect($location) {
    header("Location: {$location}");
}

?>