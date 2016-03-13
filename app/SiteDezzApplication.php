<?php

use Dez\Auth\Adapter\Session;
use Dez\Auth\Auth;
use Dez\Config\Config;
use Dez\Mvc\Application;
use Dez\ORM\Connection;
use Dez\View\Engine\Php;

class SiteDezzApplication extends Application
{

    /**
     * SiteDezzApplication constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct();

        $this->config->merge($config);
    }

    /**
     * @return $this
     */
    public function initialize()
    {
        $this->router->add('/api/:forwardController.:forwardAction', [
            'controller' => 'json-api',
            'action' => 'index',
        ]);

        $this->router->add('/:id-:slug', [
            'controller' => 'articles',
            'action' => 'item',
        ])->regex('id', '\d+')->regex('slug', '\w+');

        $this->session->start();

        return $this;
    }

    /**
     * @return $this
     */
    public function injection()
    {
        $this->getDi()->set('auth', function() {
            return new Auth(new Session($this->getDi()));
        });

        return $this;
    }

    /**
     * @return $this
     * @throws \Dez\View\Exception
     */
    public function configure()
    {
        if ($this->config->has('server')) {
            $serverConfig = $this->config->get('server');

            if($serverConfig->has('timezone')) {
                date_default_timezone_set($serverConfig['timezone']);
            }

            if($serverConfig->has('displayErrors')) {
                ini_set('display_errors', $serverConfig['displayErrors']);
            }

            if($serverConfig->has('errorLevel')) {
                error_reporting($serverConfig['errorLevel']);
            }
        }

        if ($this->config->has('application')) {
            $applicationConfig = $this->config->get('application');

            if ($applicationConfig->has('autoload')) {
                $this->loader->registerNamespaces($applicationConfig->get('autoload')->toArray())->register();
            }

            if ($applicationConfig->has('controllerNamespace')) {
                $this->setControllerNamespace($applicationConfig['controllerNamespace']);
            }

            if($applicationConfig->has('basePath')) {
                $this->url->setBasePath($applicationConfig['basePath']);

                if($applicationConfig->has('staticPath')) {
                    $this->url->setStaticPath($applicationConfig['staticPath']);
                }
            }

            if($applicationConfig->has('viewDirectory')) {
                $this->view->setViewDirectory($applicationConfig['viewDirectory']);
                $this->view->registerEngine('.php', new Php($this->view));
            }
        }

        if ($this->config->has('db')) {
            Connection::init($this->config, 'development');
        }

        return $this;
    }

}