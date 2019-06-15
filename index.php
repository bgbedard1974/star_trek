<?php
require_once('autoload.php');

use Core\Application as Application;
use Core\Services as Services;

global $services;
$services = new Services();
$application = new Application();
print($application->run());

