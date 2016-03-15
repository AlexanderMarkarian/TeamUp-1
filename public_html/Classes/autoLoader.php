<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuotLoader
 * Loads Classes 
 * @author rostom
 */
require_once '../private/config.php';
spl_autoload_register(function ($class) {

    if (file_exists($class . '.php') || file_exists(ABSOLUTH_PATH_TEMPLATES . $class . ".php")) {
        include $class . '.php';
        include ABSOLUTH_PATH_TEMPLATES . $class . ".php";
        return true;
    }
    return false;
//    throw new Exception("Unable to load $class.");
});

