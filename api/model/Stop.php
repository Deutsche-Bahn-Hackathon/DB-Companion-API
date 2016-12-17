<?php

namespace api\model;

use JsonSerializable;


/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Stop)
 * )
 */
class Stop implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $name;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $lat;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $lon;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $route_index;

    /**
     * @SWG\Property(format="dateTime")
     * @var \DateTime
     */
    private $datetime_arrival;

    /**
     * @SWG\Property(format="dateTime")
     * @var \DateTime
     */
    private $datetime_departure;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $track;

    public function __construct($id, $name, $lat, $lon, $route_index, \DateTime $datetime_arrival, \DateTime $datetime_departure, $track) {
        $this->id = $id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->route_index = $route_index;
        if ($datetime_arrival->format('Y') > 1800) {
            $this->datetime_arrival = $datetime_arrival;
        }
        if ($datetime_departure->format('Y') > 1800) {
            $this->datetime_departure = $datetime_departure;
        }
        $this->track = $track;
    }


    function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'route_index' => $this->route_index,
            'datetime_arrival' => $this->datetime_arrival,
            'datetime_departure' => $this->datetime_departure,
            'track' => $this->track
        ];
    }

}