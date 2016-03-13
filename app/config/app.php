<?php

return [
    'web' => [
        'siteName' => 'DezSite',
        'siteSlogan' => 'о коде и котиках',
    ],
    'application' => [

        'staticPath' => '/static/',
        'basePath' => '/',

        'autoload' => [
            'SiteDezz\\Controller' => __DIR__ . '/../controllers',
            'SiteDezz\\Model' => __DIR__ . '/../models',
        ],
        'controllerNamespace' => 'SiteDezz\\Controller\\',
        'modelDirectory' => __DIR__ . '/../models',
        'controllerDirectory' => __DIR__ . '/../controllers',
        'viewDirectory' => __DIR__ . '/../views',
    ],
    'server' => [
        'timezone' => 'Europe/Kiev',
        'displayErrors' => 'On',
        'errorLevel' => E_ALL,
    ],
];