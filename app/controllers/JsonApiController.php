<?php

namespace SiteDezz\Controller;

use Dez\Http\Response;
use Dez\Mvc\Controller;

class JsonApiController extends Controller {

    public function beforeExecute()
    {
        $this->response->setBodyFormat(Response::RESPONSE_API_JSON);
    }

    public function indexAction($controller = 'index', $action = 'index')
    {
        $this->execute([
            'namespace' => __NAMESPACE__ . "\\JsonApi\\",
            'controller' => $controller,
            'action' => $action,
        ]);
    }

}