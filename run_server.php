<?php

require_once __DIR__."/vendor/autoload.php";

#################################################
define('AOP_CACHE_DIR',__DIR__.'/Cache/');
define('PLUGINS_DIR', __DIR__ . '/Plugins/');
define('APPLICATION_NAME','APP-4');
define('APPLICATION_ID','app-4');
require_once __DIR__. '/vendor/pinpoint-apm/pinpoint-php-aop/auto_pinpointed.php';
#################################################

use app\HttpServer;
$server = new HttpServer();
$server->init();
$server->run();