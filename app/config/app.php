<?php

return [
    'web' => [
        'siteName' => 'Site Dezz',
        'siteSlogan' => 'Котики, мультики, web и java...',
    ],
    'application' => [

        'staticPath' => '/static/',
        'basePath' => '/',

        'autoload' => [
            'SiteDezz\\Controller' => __DIR__ . '/../controllers',
            'SiteDezz\\Model' => __DIR__ . '/../models',
            'SiteDezz\\Core' => __DIR__ . '/../common',
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