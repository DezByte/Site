<?php

namespace SiteDezz\Controller\JsonApi;

use Dez\Http\Response;
use Dez\Mvc\Controller;

abstract class AbstractJsonApiController extends Controller {

    public function beforeExecute()
    {
        $this->response->setBodyFormat(Response::RESPONSE_API_JSON);
    }

    /**
     * @param null $data
     * @param int $statusCode
     * @return Response
     */
    protected function success($data = null, $statusCode = 200)
    {
        if(is_string($data)) {
            $data = ['message' => $data];
        }

        $responseData = [
            'response' => $data,
            'status' => 'success',
        ];

        return $this->response->setContent($responseData)->setStatusCode($statusCode);
    }

    /**
     * @param null $data
     * @param int $statusCode
     * @return Response
     */
    protected function failure($data = null, $statusCode = 403)
    {
        if(is_string($data)) {
            $data = ['message' => $data];
        }

        $responseData = [
            'response' => $data,
            'status' => 'error',
        ];

        return $this->response->setContent($responseData)->setStatusCode($statusCode);
    }

}