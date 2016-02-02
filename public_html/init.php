<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Turn off all error reporting
error_reporting(1);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

header("Location: Classes/loader.php");