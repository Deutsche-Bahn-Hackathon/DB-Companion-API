<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/16/2016
 * Time: 11:15 PM
 */

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Station")
 * )
 */
namespace api\model\station;

use JsonSerializable;


class Station implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    public $id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $name;

    /**
     * @SWG\Property(format="number")
     * @var double
     */
    private $lat;

    /**
     * @SWG\Property(format="number")
     * @var double
     */
    private $lon;

    public function __construct($id, $name, $lat, $lon) {
        $this->id = $id;
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lat' => $this->lat,
            'lon' => $this->lon
        ];
    }
}