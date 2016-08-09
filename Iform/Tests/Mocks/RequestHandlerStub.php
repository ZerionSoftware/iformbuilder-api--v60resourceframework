<?php namespace Iform\Tests\Mocks;

use Iform\Resolvers\RequestHandler;

class RequestHandlerStub extends RequestHandler {

    public function read($url, $params = [], $header = null)
    {
        $data = range(0,1000);
        if (! is_null($header)) {
            //simulate a collection response
            if ($url === "") {
                $result = array('error_message' => 'resource not found');
            } else {
                $result = [1,2,3];
            }

            if (isset($params['offset'])) {
                return array('header' => 'total-count: 1000', 'body' => json_encode(array_slice($data, $params['offset'])));
            }

            if (isset($params['limit'])) {
                return array('header' => 'total-count: 100', 'body' => json_encode(array_slice($data, 0, $params['limit'])));
            }

            return array('header' => '', 'body' => json_encode($result));
        }

        if (preg_match('/\/localizations\//', $url)) {
            return json_encode(array(
                "language_code"=> "es",
                "label"=> "inspección de la construcción"
            ));
        }

        if (isset($params['offset'])) {
            return array_slice($data, $params['offset']);
        }

        if (isset($params['limit'])) {
            return array_slice($data, 0, $params['limit']);
        }

        return json_encode(array('id' => 790783, "name" => "who_bsl2_quick_feedback"));
    }

    public function create($url, $params = [])
    {
        return json_encode(array('id' => 1232123));
    }

    public function update($url, $params = [])
    {
        return json_encode(array('id' => 1232123));
    }

    public function delete($id)
    {
        return json_encode(array());
    }
}