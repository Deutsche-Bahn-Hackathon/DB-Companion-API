<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 3:46 PM
 */

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Station")
 * )
 */
class Station implements JsonSerializable {

    /**
     * @SWG\Property(format="int64")
     * @var int
     */
    private $id;

    /**
     * @SWG\Property
     * @var Coordinates
     */
    private $coordinate;

    function jsonSerialize() {
    }
}