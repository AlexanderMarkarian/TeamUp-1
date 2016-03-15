<?php

require_once '/home/dynamoelectric/public_html/dev.teamup/public_html/private/config.php';
spl_autoload_register(function ($class) {

    if (file_exists(ABSOLUTH_PATH_CLASSES.$class . '.php')) {
        include ABSOLUTH_PATH_CLASSES.$class . '.php';
        //include ABSOLUTH_PATH_TEMPLATES . $class . ".php";
        return true;
    }
    return false;
    throw new Exception("Unable to load $class.");
});