<?php

namespace api\model\station;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Station")
 * )
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