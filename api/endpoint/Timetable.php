<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/16/2016
 * Time: 10:53 PM
 */

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Timetable {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function search(Request $request, Response $response, array $args) {
        $locations = json_decode(file_get_contents('https://open-api.bahn.de/bin/rest.exe/location.name?authKey=DBhackFrankfurt0316&lang=en&input=' . $args['arg'] . '&format=json'), true);


    }
}