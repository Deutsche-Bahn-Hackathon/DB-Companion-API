<?php

namespace api\model;

use api\model\wagon\Wagon;
use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Train")
 * )
 */
class Train implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $id;

    /**
     * @var Wagon
     * * @SWG\Property(@SWG\Xml(name="wagons",wrapped=true))
     */
    private $wagons;

    /**
     * Train constructor.
     * @param string $id
     * @param Wagon[] $wagons
     */
    public function __construct($id, $wagons) {
        $this->id = $id;
        $this->wagons = $wagons;
    }

    function jsonSerialize() {
        return [
            'id' => $this->id,
            'wagons' => $this->wagons,
        ];
    }
}