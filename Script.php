<?php

/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 6:36 AM
 */
class Station implements JsonSerializable {

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
     * @SWG\Property(format="number")
     * @var double
     */
    private $lat;

    /**
     * @SWG\Property(format="number")
     * @var double
     */
    private $lon;

    public function __construct($id, $name, $lat, $lon) {
        $this->id = $id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lat' => $this->lat,
            'lon' => $this->lon
        ];
    }
}

$content = json_decode(file_get_contents('http://localhost:8080/static/stations.json'), true);

$tmp = [];

foreach ($content['stations'] as $item) {
    $tmp[] = new Station($item['id'], $item['name'], $item['coordinates']['lat'], $item['coordinates']['lon']);
}

echo json_encode($tmp);
