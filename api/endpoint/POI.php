<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 11:15 AM
 */

namespace api\endpoint;


use Slim\Http\Request;
use Slim\Http\Response;

class POI {
    public static function getPois(Request $request, Response $response, array $args) {

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(file_get_contents('https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=AIzaSyCjhrr_l_aEVO8iFQE0Bq9Q4LL3VumeHe4&location=' . $args['lat'] . ',' . $args['lon'] . '&radius=1000&types=point_of_interes|locality|country'));
    }
}