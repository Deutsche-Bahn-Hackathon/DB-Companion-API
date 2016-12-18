<?php

namespace api\model\wagon;

use JsonSerializable;
use api\model\Beacon;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Wagon")
 * )
 */
abstract class Wagon implements JsonSerializable{
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $id;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    protected $construction_year;

    /**
     * @var Beacon[]
     * @SWG\Property(@SWG\Xml(name="beacons",wrapped=true))
     */
    protected $beacons;

    function jsonSerialize() {
    }
}