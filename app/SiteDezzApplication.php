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
        $this->router->add('/api/:api_controller.:api_action', [
            'controller' => 'json-api',
            'action' => 'index',
        ]);

        $this->router->add('/articles/:action/:id/:slug', [
            'controller' => 'articles',
        ])->regex('slug', '\w+');

        $this->router->add('/:article_id-:slug.html', [
            'controller' => 'articles',
            'action' => 'item'
        ])->regex('article_id', '\d+')->regex('slug', '\w+');

        $this->router->add('/:latin_slug.:language', [
            'controller' => 'bin',
            'action' => 'item',
        ])->regex('language', '(php|java|cpp|python|ruby|js|html)');

        $this->router->add('/:latin_slug.:language/:format', [
            'controller' => 'bin',
            'action' => 'formatted',
        ])->regex('language', '(php|java|cpp|python|ruby|js|html)');

        $this->session->start();

        return $this;
    }

    /**
     * @return $this
     */
    public function injection()
    {
        $this->getDi()->set('auth', function () {
            return new Auth(new Session($this->getDi()));
        });

        return $this;
    }

}