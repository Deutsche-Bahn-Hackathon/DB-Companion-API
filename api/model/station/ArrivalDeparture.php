<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 12:41 AM
 */

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
    private $track;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $journey;
}