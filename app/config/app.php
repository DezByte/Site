<?php

return [
    'application'   => [

        'staticPath'    => '/',
        'basePath'      => '/',

        'autoload'              => [
            'SiteDezz\\Controller'     => __DIR__ . '/../controllers',
            'SiteDezz\\Model'          => __DIR__ . '/../models',
        ],
        'controllerNamespace'   => 'SiteDezz\\Controller\\',
        'modelDirectory'        => __DIR__ . '/../models',
        'controllerDirectory'   => __DIR__ . '/../controllers',
        'viewDirectory'         => __DIR__ . '/../views',
    ]
];