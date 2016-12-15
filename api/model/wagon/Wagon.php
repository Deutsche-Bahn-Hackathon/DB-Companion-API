<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 4:56 PM
 */

namespace api\model;

use JsonSerializable;

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