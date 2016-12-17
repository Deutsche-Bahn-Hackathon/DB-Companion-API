<?php

namespace api\endpoint;

use api\model\station\Arrival;
use api\model\station\Departure;
use DateTime;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Station {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getAll(Request $request, Response $response, array $args) {
        $stations = file_get_contents(BASE_URL . '/static/stations.json');

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write($stations);
    }

    public static function search(Request $request, Response $response, array $args) {
        $locations = json_decode(file_get_contents('https://open-api.bahn.de/bin/rest.exe/location.name?authKey=DBhackFrankfurt0316&lang=en&input=' . $args['arg'] . '&format=json'), true);
        $data = [];

        if (!isset($locations['LocationList']['StopLocation']['id'])) {
            foreach ($locations['LocationList']['StopLocation'] as $location) {
                $data[] = new \api\model\station\Station($location['id'], $location['name'], $location['lat'], $location['lon']);
            }
        } else {
            $location = $locations['LocationList']['StopLocation'];
            $data[] = new \api\model\station\Station($location['id'], $location['name'], $location['lat'], $location['lon']);
        }

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson(['stations' => $data]);
    }

    public static function departures(Request $request, Response $response, array $args) {
        $departures = json_decode(file_get_contents('https://open-api.bahn.de/bin/rest.exe/departureBoard?authKey=DBhackFrankfurt0316&lang=en&id=' . $args['id'] . '&date=' . date('Y-m-d') . '&time=' . date('G') . '%3a' . date('i') . '&format=json'), true);
        $data = [];

        if (!isset($departures['DepartureBoard']['Departure']['name'])) {
            foreach ($departures['DepartureBoard']['Departure'] as $departure) {
                $data[] = new Departure($departure['name'], $departure['type'], $departure['stopid'], $departure['stop'], DateTime::createFromFormat('Y-m-d G:i', $departure['date'] . ' ' . $departure['time']), $departure['direction'], $departure['track'], str_replace('https://open-api.bahn.de/bin/rest.exe/', '', $departure['JourneyDetailRef']['ref']));
            }
        } else {
            $departure = $departures['DepartureBoard']['Departure'];
            $data[] = new Departure($departure['name'], $departure['type'], $departure['stopid'], $departure['stop'], DateTime::createFromFormat('Y-m-d G:i', $departure['date'] . ' ' . $departure['time']), $departure['direction'], $departure['track'], str_replace('https://open-api.bahn.de/bin/rest.exe/', '', $departure['JourneyDetailRef']['ref']));
        }

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson(['departures' => $data]);
    }

    public static function arrivals(Request $request, Response $response, array $args) {
        $arrivals = json_decode(file_get_contents('https://open-api.bahn.de/bin/rest.exe/arrivalBoard?authKey=DBhackFrankfurt0316&lang=en&id=' . $args['id'] . '&date=' . date('Y-m-d') . '&time=' . date('G') . '%3a' . date('i') . '&format=json'), true);
        $data = [];

        if (!isset($arrivals['ArrivalBoard']['Arrival']['name'])) {
            foreach ($arrivals['ArrivalBoard']['Arrival'] as $arrival) {
                $data[] = new Arrival($arrival['name'], $arrival['type'], $arrival['stopid'], $arrival['stop'], DateTime::createFromFormat('Y-m-d G:i', $arrival['date'] . ' ' . $arrival['time']), $arrival['origin'], $arrival['track'], str_replace('https://open-api.bahn.de/bin/rest.exe/', '', $arrival['JourneyDetailRef']['ref']));
            }
        } else {
            $arrival = $arrivals['ArrivalBoard']['Arrival'];
            $data[] = new Arrival($arrival['name'], $arrival['type'], $arrival['stopid'], $arrival['stop'], DateTime::createFromFormat('Y-m-d G:i', $arrival['date'] . ' ' . $arrival['time']), $arrival['origin'], $arrival['track'], str_replace('https://open-api.bahn.de/bin/rest.exe/', '', $arrival['JourneyDetailRef']['ref']));
        }

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson(['arrivals' => $data]);
    }

    public static function journey(Request $request, Response $response, array $args) {
        $arrivals = json_decode(file_get_contents('https://open-api.bahn.de/bin/rest.exe/' . $args['journey']), true);
        $data = [];
    }
}