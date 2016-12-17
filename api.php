<?php

/**
 * @SWG\Swagger(
 *     schemes={"https"},
 *     host="deutsche-bahn-api.appspot.com",
 *     basePath="/",
 *     @SWG\Info(
 *         version="0.0.1",
 *         title="DB Companion",
 *         description="Project DB Companion at Deutsche Bahn Hackathon Berlin 2016",
 *         termsOfService="http://helloreverb.com/terms/",
 *         @SWG\Contact(
 *             email="shopit.developments@gmail.com"
 *         ),
 *         @SWG\License(
 *             name="Apache 2.0",
 *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *         )
 *     )
 * )
 */

use api\endpoint\Endpoint;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

define('BASE_URL', 'https://deutsche-bahn-api.appspot.com');
//define('BASE_URL', 'http://localhost:8080');

require_once __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('Europe/Rome');

spl_autoload_register(function ($class) {
    /** @noinspection PhpIncludeInspection */
    require_once sprintf('%s/%s.php', $_SERVER['DOCUMENT_ROOT'], str_replace('\\', '/', $class));
});

class Logger {

    public function __invoke(Request $request, Response $response, $next) {
        return $next($request, $response);
    }
}

$app = (new App(new \Slim\Container([
    'settings' => [
        'displayErrorDetails' => true,
    ],
])))->add(new Logger);

$app->get('/swagger.json', Endpoint::add('Swagger', 'get'));

/**
 * @SWG\Get(
 *     path="/stations",
 *     consumes={""},
 *     description="Returns all stations",
 *     operationId="get",
 *     produces={"application/json"},
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(ref="#/definitions/Station")
 *         ),
 *     ),
 *     summary="Returns all stations",
 *     tags={
 *         "station"
 *     }
 * )
 * */
$app->get('/stations', Endpoint::add('Station', 'getAll'));

/**
 * @SWG\Get(
 *     path="/stations/search/{arg}",
 *     summary="Search for stations",
 *     description="Multiple search terms can be separated by a '+'",
 *     operationId="search",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"station"},
 *     @SWG\Parameter(
 *         description="Search term ",
 *         in="path",
 *         name="arg",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(ref="#/definitions/Station")
 *         ),
 *     )
 * )
 */
$app->get('/stations/search/{arg}', Endpoint::add('Station', 'search'));

/**
 * @SWG\Get(
 *     path="/stations/{id}/departures",
 *     summary="Get the departures of a station",
 *     description="If you want to select the time, ask the backend developer",
 *     operationId="departures",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"station"},
 *     @SWG\Parameter(
 *         description="Station ID",
 *         in="path",
 *         name="id",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(ref="#/definitions/Station")
 *         ),
 *     )
 * )
 */
$app->get('/stations/{id}/departures', Endpoint::add('Station', 'departures'));

/**
 * @SWG\Get(
 *     path="/stations/{id}/arrivals",
 *     summary="Get the arrivals of a station",
 *     description="If you want to select the time, ask the backend developer",
 *     operationId="arrivals",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"station"},
 *     @SWG\Parameter(
 *         description="Station ID",
 *         in="path",
 *         name="id",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(ref="#/definitions/Station")
 *         ),
 *     )
 * )
 */
$app->get('/stations/{id}/arrivals', Endpoint::add('Station', 'arrivals'));

/**
 * @SWG\Get(
 *     path="/stations/{journey}",
 *     summary="Display the journey",
 *     description="Displays the whole journey",
 *     operationId="journey",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"station"},
 *     @SWG\Parameter(
 *         description="Journey URL",
 *         in="path",
 *         name="id",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         @SWG\Schema(
 *             type="array",
 *             @SWG\Items(ref="#/definitions/Station")
 *         ),
 *     )
 * )
 */
$app->get('/stations/journey/[{journey:.*}]', Endpoint::add('Station', 'journey'));

/**
 * @SWG\Get(
 *     path="/train/{train}/wagon/{wagon}/toilet",
 *     summary="Get status of Toilet",
 *     description="Displays the status of the toilet",
 *     operationId="get",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"facility"},
 *     @SWG\Parameter(
 *         description="Train ID",
 *         in="path",
 *         name="train",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Wagon ID",
 *         in="path",
 *         name="wagon",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->get('/train/{train}/wagon/{wagon}/toilet', Endpoint::add('Toilet', 'get'));

/**
 * @SWG\Get(
 *     path="/train/{train}/wagon/{wagon}/toilet/{status}",
 *     summary="Set status of Toilet",
 *     description="Sets the status of the toilet",
 *     operationId="put",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"facility"},
 *     @SWG\Parameter(
 *         description="Train ID",
 *         in="path",
 *         name="train",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Wagon ID",
 *         in="path",
 *         name="wagon",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Status",
 *         in="path",
 *         name="status",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->put('/train/{train}/wagon/{wagon}/toilet/{status}', Endpoint::add('Toilet', 'put'));

/**
 * @SWG\Get(
 *     path="/train/{train}/wagon",
 *     summary="Get Beacons of a train",
 *     description="Get Beacons of a train",
 *     operationId="getBeacons",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"beacons"},
 *     @SWG\Parameter(
 *         description="Train ID",
 *         in="path",
 *         name="train",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->get('/train/{train}/wagons', Endpoint::add('TrainBeacon', 'getBeacons'));

/**
 * @SWG\Post(
 *     path="/train/{train}/coffee",
 *     summary="Order coffee",
 *     description="Order coffee",
 *     operationId="startOffer",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"coffee"},
 *     @SWG\Parameter(
 *         description="Train ID",
 *         in="path",
 *         name="train",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->post('/train/{train}/coffee', Endpoint::add('Coffee', 'startOffer'));

/**
 * @SWG\Get(
 *     path="/train/{train}/wagon/{wagon}/next/{facility}",
 *     summary="Next facility",
 *     description="Shows the nearest facility",
 *     operationId="getNext",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"facility"},
 *     @SWG\Parameter(
 *         description="Train",
 *         in="path",
 *         name="train",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Wagon",
 *         in="path",
 *         name="wagon",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Facility",
 *         in="path",
 *         name="facility",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->get('/train/{train}/wagon/{wagon}/next/{facility}', Endpoint::add('Facility', 'getNext'));

/**
 * @SWG\Get(
 *     path="/weather/{lat}/{lon}",
 *     summary="Weather at the given coordinates",
 *     description="Weather at the given coordinates",
 *     operationId="getWeather",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"weather"},
 *     @SWG\Parameter(
 *         description="Latitude",
 *         in="path",
 *         name="lat",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Longitude",
 *         in="path",
 *         name="lon",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->get('/weather/{lat}/{lon}', Endpoint::add('Weather', 'getWeather'));

/**
 * @SWG\Get(
 *     path="/pois/{lat}/{lon}",
 *     summary="Nearby POIs",
 *     description="Returns nearby POIs",
 *     operationId="getPois",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"pois"},
 *     @SWG\Parameter(
 *         description="Latitude",
 *         in="path",
 *         name="lat",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Parameter(
 *         description="Longitude",
 *         in="path",
 *         name="lon",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->get('/pois/{lat}/{lon}', Endpoint::add('POI', 'getPois'));

/**
 * @SWG\Get(
 *     path="/photo/{reference}",
 *     summary="Image of POI",
 *     description="Image of POI",
 *     operationId="getPhoto",
 *     consumes={""},
 *     produces={"application/json"},
 *     tags={"pois"},
 *     @SWG\Parameter(
 *         description="Reference",
 *         in="path",
 *         name="reference",
 *         required=true,
 *         type="string",
 *         format="string"
 *     ),
 *     @SWG\Response(
 *         response=200,
 *         description="successful operation",
 *         ),
 *     )
 * )
 */
$app->get('/photo/{reference}', Endpoint::add('POI', 'getPhoto'));

$app->get('/ticket', Endpoint::add('Ticket', 'create'));

$app->run();