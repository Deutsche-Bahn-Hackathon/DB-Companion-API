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

use api\model\Coordinates;
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
     * @SWG\Property()
     * @var Coordinates
     */
    private $coordinates;

    public function __construct($id, $name, Coordinates $coordinates) {
        $this->id = $id;
        $this->name = $name;
        $this->coordinates = $coordinates;
    }


    function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'coordinates' => $this->coordinates
        ];
    }
}