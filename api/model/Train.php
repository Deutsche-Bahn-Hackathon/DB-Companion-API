<?php

namespace api\model;

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
     * @var Wagon[]
     * * @SWG\Property(@SWG\Xml(name="wagons",wrapped=true))
     */
    private $wagons;

    /**
     * Train constructor.
     * @param string $id
     */
    public function __construct($id, $wagons) {
        $this->id = $id;
        $this->wagons = $wagons;
    }

    function jsonSerialize() {
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return Wagon[]
     */
    public function getWagons() {
        return $this->wagons;
    }

    /**
     * @param Wagon[] $wagons
     */
    public function setWagons($wagons) {
        $this->wagons = $wagons;
    }


}