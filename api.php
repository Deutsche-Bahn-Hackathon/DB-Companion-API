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

define('BASE_URL', 'http://deutsche-bahn-api.appspot.com');

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
+ * @SWG\Get(
+ *     path="/stations/search/{arg}",
+ *     summary="Search for stations",
+ *     description="Multiple search terms can be separated by a '+'",
+ *     operationId="search",
+ *     consumes={""},
+ *     produces={"application/json"},
+ *     tags={"timetable"},
+ *     @SWG\Parameter(
+ *         description="Search term ",
+ *         in="path",
+ *         name="arg",
+ *         required=true,
+ *         type="string",
+ *         format="string"
+ *     ),
+ *     @SWG\Response(
+ *         response=200,
+ *         description="successful operation",
+ *         @SWG\Schema(
+ *             type="array",
+ *             @SWG\Items(ref="#/definitions/Location")
+ *         ),
+ *     )
+ * )
+ */
$app->get('/stations/search/{arg}', Endpoint::add('Timetable', 'search'));

$app->get('/stations/{id}/departures', Endpoint::add('Timetable', 'departures'));

$app->get('/train/{train}/toilet/{id}/status', Endpoint::add('Toilet', 'get'));
$app->put('/train/{train}/toilet/{id}/status/{status}', Endpoint::add('Toilet', 'put'));

$app->run();