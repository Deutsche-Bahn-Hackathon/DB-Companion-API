<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 3:50 PM
 */

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Coordinates")
 * )
 */
class Coordinates implements JsonSerializable {

    /**
     * @SWG\Property(format="double")
     * @var double
     */
    private $lat;

    /**
     * @SWG\Property(format="double")
     * @var double
     */
    private $long;

    public function __construct($lat, $long) {
        $this->lat = $lat;
        $this->long = $long;
    }

    function jsonSerialize() {
    }

    public function getLat() {
        return $this->lat;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function getLong() {
        return $this->long;
    }

    public function setLong($long) {
        $this->long = $long;
    }


}