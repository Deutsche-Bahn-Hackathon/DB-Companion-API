<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 4:04 AM
 */

class Location implements JsonSerializable {
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $name;

    /**
     * @SWG\Property()
     * @var Coordinates
     */
    private $coordinates;

    /**
     * Location constructor.
     * @param string $id
     * @param string $name
     * @param Coordinates $coordinates
     */
    public function __construct($id, $name, Coordinates $coordinates) {
        $this->id = $id;
        $this->name = $name;
        $this->coordinates = $coordinates;
    }


    function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'coordinates' => $this->coordinates
        ];
    }
}

class Coordinates implements JsonSerializable {

    /**
     * @SWG\Property(format="double")
     * @var double
     */
    private $lat;

    /**
     * @SWG\Property(format="double")
     * @var double
     */
    private $lon;

    public function __construct($lat, $lng) {
        $this->lat = $lat;
        $this->lon = $lng;
    }

    function jsonSerialize() {
        return [
            'lat' => $this->lat,
            'lon' => $this->lon
        ];
    }

    public function getLat() {
        return $this->lat;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function getLon() {
        return $this->lon;
    }

    public function setLon($lon) {
        $this->lon = $lon;
    }


}

$content = [];

for ($i = 119; $i < 123

; $i++) {
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