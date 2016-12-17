<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 12:41 AM
 */

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Departure")
 * )
 */
class Departure implements JsonSerializable {

    private $name;
    private $type;
    private $stop_id;
    private $stop;
    private $datetime;
    private $direction;
    private $track;


    function jsonSerialize() {
    }
}