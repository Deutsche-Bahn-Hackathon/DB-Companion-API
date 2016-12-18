<?php

namespace api\model\station;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="ArrivalDeparture")
 * )
 */
abstract class ArrivalDeparture implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $name;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $type;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    protected $stop_id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $stop;

    /**
     * @SWG\Property(format="dateTime")
     * @var \DateTime
     */
    protected $datetime;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $track;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $journey;

    function jsonSerialize() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'stop_id' => $this->stop_id,
            'stop' => $this->stop,
            'datetime' => date(DATE_RFC3339, strtotime($this->datetime)),
            'track' => $this->track,
            'journey' => $this->journey
        ];
    }
}