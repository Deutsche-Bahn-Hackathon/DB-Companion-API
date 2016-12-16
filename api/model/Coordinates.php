<?php

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Coordinates")
 * )
 */
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