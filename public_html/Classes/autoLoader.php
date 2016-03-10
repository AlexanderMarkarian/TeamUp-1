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

function __autoload($class) {

    //include "../Classes/" . $class . ".php";
    include $class . ".php";
    include "../cronjob/" . $class . ".php";
    include "../templates/" . $class . ".php";
}
