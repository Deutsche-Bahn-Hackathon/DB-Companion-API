<?php

/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/16/2016
 * Time: 8:37 PM
 */

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Station {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }


    public static function getAll(Request $request, Response $response, array $args) {
        $stations_raw = file('http://localhost:8080/static/stations.csv');
        $stations = [];

        foreach ($stations_raw as $station_csv) {
            $station = str_getcsv($station_csv, ';');
            $station = new \api\model\Station($station[2], $station[0], $station[3], $station[6], $station[7], $station[8]);
            $stations[] = $station;
        }

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson(['stations' => $stations]);
    }
}