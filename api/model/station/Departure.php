<?php

namespace api\model\station;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Departure")
 * )
 */
class Departure {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $direction;

    public function __construct($name, $type, $stop_id, $stop, \DateTime $datetime, $direction, $track, $journey) {
        $this->name = $name;
        $this->type = $type;
        $this->stop_id = $stop_id;
        $this->stop = $stop;
        $this->datetime = $datetime;
        $this->direction = $direction;
        $this->track = $track;
        $this->journey = $journey;
    }

    function jsonSerialize() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'stop_id' => $this->stop_id,
            'stop' => $this->stop,
            'datetime' => date(DATE_RFC3339, strtotime($this->datetime)),
            'direction' => $this->direction,
            'track' => $this->track,
            'journey' => $this->journey
        ];
    }
}