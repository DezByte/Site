<?php

namespace SiteDezz\Controller;

use Dez\Http\Response;
use Dez\Mvc\Controller;

class JsonApiController extends Controller {

    public function beforeExecute()
    {
        $this->response->setBodyFormat(Response::RESPONSE_API_JSON);
    }

    public function authStatusAction()
    {
        $this->response->setContent([
            'is_guest' => $this->auth->isGuest(),
            'user' => $this->auth->getModel()->toArray()
        ])->setStatusCode(200);
    }

    public function signInAction()
    {
        $auth = $this->auth->authenticate('stewie.dev@gmail.com', '123qwe');

        $this->response->setContent([
            'user' => $auth->getModel()->toArray()
        ])->setStatusCode(200);
    }

    public function indexAction()
    {
        $this->response->setContent([
            'controller' => $this
        ]);
    }

}