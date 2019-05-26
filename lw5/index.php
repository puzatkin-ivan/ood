<?php

require_once 'vendor/autoload.php';

define('ROOT_DIR', __DIR__);

use App\App;

$app = new App();
$app->run();