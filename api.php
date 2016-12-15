<?php

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

$c = new \Slim\Container();

$app = (new App($c))->add(new Logger);

$app->get('/test/{arg}', Endpoint::add('TestEndpoint', 'doTest'));

$app->run();