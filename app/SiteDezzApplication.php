<?php

use Dez\Auth\Adapter\Session;
use Dez\Auth\Auth;
use SiteDezz\Core\Application\ApplicationConfigurable;

include_once __DIR__ . '/common/Application/ApplicationConfigurable.php';

class SiteDezzApplication extends ApplicationConfigurable
{

    /**
     * @return $this
     */
    public function configure()
    {
        return parent::configure();
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

        $this->router->add('/articles/:action/:id/:slug', [
            'controller' => 'articles',
        ])->regex('slug', '\w+');

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

}