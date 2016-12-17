<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 11:15 AM
 */

namespace api\endpoint;


use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class POI {

    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function getPois(Request $request, Response $response, array $args) {
        $locations = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=AIzaSyCjhrr_l_aEVO8iFQE0Bq9Q4LL3VumeHe4&location=' . $args['lat'] . ',' . $args['lon'] . '&radius=1000&types=point_of_interes|locality|country'), true);

        if (count($locations['results']) == 0) {
            return $response
                ->withStatus(204);
        }

        $place_id = $locations['results'][0]['place_id'];

        $place = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $place_id . '&key=AIzaSyCjhrr_l_aEVO8iFQE0Bq9Q4LL3VumeHe4'), true);

        $poi = new \api\model\POI(isset($place['result']['formatted_address']) ? $place['result']['formatted_address'] : '', $place['result']['geometry']['location']['lat'], $place['result']['geometry']['location']['lng'], isset($place['result']['photos'][0]['photo_reference']) ? $place['result']['photos'][0]['photo_reference'] : '', isset($place['result']['url']) ? $place['result']['url'] : '', isset($place['result']['website']) ? $place['result']['website'] : '');

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withJson(['poi' => $poi]);
    }

    public static function getPhoto(Request $request, Response $response, array $args) {
        $photo = file_get_contents('https://maps.googleapis.com/maps/api/place/photo?key=AIzaSyCjhrr_l_aEVO8iFQE0Bq9Q4LL3VumeHe4&photoreference=' . $args['reference']);

        return $response
            ->withHeader('Content-Type', 'image/jpg')
            ->write($photo);
    }
}