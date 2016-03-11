<?php

    namespace SiteDezz\Controller;

    use Dez\Http\Response;
    use Dez\Mvc\Controller;

    class IndexController extends Controller
    {

        public function indexAction( $id )
        {
            $this->response->setBodyFormat(Response::RESPONSE_API_JSON);
            $this->response->setContent([
                'item_id' => $id,
            ]);
        }

        public function helloAction ()
        {
            $this->response->setContent([1]);
        }

    }