<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Weather {
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getWeather(Request $request, Response $response, array $args) {
        $weather = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?lat=' . $args['lat'] .'&lon=' . $args['lon'] .'&appid=3a6640bd7b0345ab109ce165e45cbfc6'), true);

        $data['main'] = $weather['weather'][0]['main'];
        $data['description'] = $weather['weather'][0]['description'];
        $data['temperatur'] = $weather['main']['temp'];
        $data['temperatur_min'] = $weather['main']['temp_min'];
        $data['temperatur_max'] = $weather['main']['temp_max'];

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson(['weather' => $data]);
    }
}