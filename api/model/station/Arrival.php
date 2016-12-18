<?php

namespace api\model\station;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Arrival")
 * )
 */
class Arrival extends ArrivalDeparture {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $origin;

    public function __construct($name, $type, $stop_id, $stop, \DateTime $datetime, $origin, $track, $journey) {
        $this->name = $name;
        $this->type = $type;
        $this->stop_id = $stop_id;
        $this->stop = $stop;
        $this->datetime = $datetime;
        $this->origin = $origin;
        $this->track = $track;
        $this->journey = $journey;
    }

    function jsonSerialize() {
        return [
            parent::jsonSerialize(),
            'origin' => $this->origin
        ];
    }
}