<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class TestEndpoint {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }


    /**
     * @SWG\Get(
     *     path="/test/{arg}",
     *     consumes={"text/plain"},
     *     description="",
     *     operationId="get",
     *     @SWG\Parameter(
     *         description="Text to be displayed",
     *         format="string",
     *         in="path",
     *         name="arg",
     *         required=true,
     *         type="string"
     *     ),
     *     produces={"application/json"},
     *     @SWG\Response(
     *         response="200",
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/ApiResponse")
     *     ),
     *     summary="Displays text in path",
     *     tags={
     *         "test"
     *     }
     * )
     * */
    public function doTest(Request $request, Response $response, array $args) {
        return $response->withJson(['test' => $args['arg']]);
    }
}