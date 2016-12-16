<?php

/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host="localhost:8080",
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

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);

$app = (new App($c))->add(new Logger);

$app->get('/test/{arg}', Endpoint::add('TestEndpoint', 'doTest'));

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

$app->get('/search/stations/{arg}', Endpoint::add('Timetable', 'search'));

$app->run();