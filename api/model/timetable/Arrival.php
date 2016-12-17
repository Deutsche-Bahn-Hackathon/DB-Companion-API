<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 3:04 AM
 */

namespace api\model\timetable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Arrival")
 * )
 */
class Arrival {

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
            'name' => $this->name,
            'type' => $this->type,
            'stop_id' => $this->stop_id,
            'stop' => $this->stop,
            'datetime' => date(DATE_RFC3339, strtotime($this->datetime)),
            'origin' => $this->origin,
            'track' => $this->track,
            'journey' => $this->journey
        ];
    }
}