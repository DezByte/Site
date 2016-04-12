<?php

namespace SiteDezz;

use Dez\Config\Config;

include_once '../app/vendor/autoload.php';
include_once '../app/SiteDezzApplication.php';

$app = new \SiteDezzApplication(
    Config::factory('../app/config/app.php')->merge(
        Config::factory('../app/config/connection.json')
    )
);

$app->configure()->injection()->initialize()->run();