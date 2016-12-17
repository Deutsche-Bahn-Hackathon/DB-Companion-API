<?php

namespace api\endpoint;

use api\model\Coordinates;
use api\model\timetable\Location;
use Slim\Http\Request;
use Slim\Http\Response;

class get {

    public static function get(Request $request, Response $response, array $args) {
        $content = [];

        for ($i = 97; $i < 123; $i++) {
            for ($j = 97; $j < 123; $j++) {

                $locations = json_decode(file_get_contents('https://open-api.bahn.de/bin/rest.exe/location.name?authKey=DBhackFrankfurt0316&lang=en&input=' . chr($i) . chr($j) . '&format=json'), true);
                $data = [];

                if (!isset($locations['LocationList']['StopLocation']['id'])) {
                    foreach ($locations['LocationList']['StopLocation'] as $location) {
                        $data[] = new Location($location['id'], $location['name'], new Coordinates($location['lat'], $location['lon']));
                    }
                } else {
                    $location = $locations['LocationList']['StopLocation'];
                    $data[] = new Location($location['id'], $location['name'], new Coordinates($location['lat'], $location['lon']));
                }

                foreach ($data as $item) {
                    $array = false;
                    foreach ($content as $value) {
                        if ($item->id === $value->id) {
                            $array = true;
                            break;
                        }
                    }
                    if (!$array) {
                        $content[] = $item;
                    }
                }
            }
        }

        echo '{"locations":[';
        foreach ($content as $item) {
            echo json_encode($item) . ',';
        }
        echo ']}';
    }
}