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
    private $lng;

    public function __construct($lat, $lng) {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    function jsonSerialize() {
    }

    public function getLat() {
        return $this->lat;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function getLng() {
        return $this->lng;
    }

    public function setLng($lng) {
        $this->lng = $lng;
    }


}