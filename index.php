<?php

require 'vendor/autoload.php';
require 'src/lib/routes.php';

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);

ini_set('display_errors', TRUE);

ini_set('log_errors', TRUE);

ini_set('error_log', 'php-error.log');

error_log('Hello, Errors!');

set_exception_handler(function($exception) {
    error_log($exception->getMessage());
});



