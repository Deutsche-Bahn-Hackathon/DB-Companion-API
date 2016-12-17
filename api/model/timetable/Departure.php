<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 12:41 AM
 */

namespace api\model\timetable;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Departure")
 * )
 */
class Departure implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $name;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $type;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $stop_id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $stop;

    /**
     * @SWG\Property(format="dateTime")
     * @var \DateTime
     */
    private $datetime;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $direction;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $track;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $journey;

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